<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DefisController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\WasteController;
use App\Models\ImpactAction;
use App\Models\User;
use App\Services\UserImpactStatsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }

    return view('welcome');
});

Route::get('/solutions', function () {
    return view('solutions');
});

Route::get('/join', function () {
    return view('join');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'consent' => 'accepted',
    ]);

    $logEntry = now()->format('Y-m-d H:i:s') . ' | ' . $data['name'] . ' | ' . $data['email'] . ' | ' . $data['subject'] . PHP_EOL;
    file_put_contents(storage_path('logs/contact_messages.txt'), $logEntry, FILE_APPEND);

    return response()->json([
        'success' => true,
        'message' => 'Message envoyé avec succès',
    ]);
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function (UserImpactStatsService $statsService) {
        $stats = $statsService->summary(Auth::user());

        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::get('/impact', function (UserImpactStatsService $statsService) {
        $user = Auth::user();
        $waste = ImpactAction::where('user_id', $user->id)->sum('waste_kg');
        $carbon = ImpactAction::where('user_id', $user->id)->sum('carbon_kg');
        $impactStats = $statsService->impactPagePayload($user);

        return view('impact', compact('waste', 'carbon', 'impactStats'));
    })->name('impact');

    Route::get('/impact/stats-json', function (UserImpactStatsService $statsService) {
        return response()->json($statsService->impactPagePayload(Auth::user()));
    })->name('impact.stats');

    Route::get('/scan', [ScanController::class, 'hub'])->name('scan');
    Route::get('/scanner', [ScanController::class, 'scanner'])->name('scanner');
    Route::post('/scan/search', [ScanController::class, 'search'])->name('scan.search');

    Route::get('/defis', [DefisController::class, 'index'])->name('defis');

    Route::get('/assistant', [WasteController::class, 'index'])->name('assistant');
    Route::post('/generate', [WasteController::class, 'generate'])->name('generate');

    Route::post('/recycle', function (Request $request) {
        $validated = $request->validate([
            'category' => 'nullable|string|max:64',
            'waste_kg' => 'required|numeric',
            'carbon_kg' => 'required|numeric',
        ]);

        ImpactAction::create([
            'user_id' => Auth::id(),
            'type' => 'recycle',
            'category' => $validated['category'] ?? 'recycle',
            'waste_kg' => $validated['waste_kg'],
            'carbon_kg' => $validated['carbon_kg'],
        ]);

        return redirect()->route('impact');
    });

    Route::get('/edit/{id}', function ($id) {
        $user = User::find($id);

        return view('join', compact('user'));
    });

    Route::put('/update/{id}', function (Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/join');
    });
});
