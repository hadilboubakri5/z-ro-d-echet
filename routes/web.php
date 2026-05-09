<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\ImpactAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\WasteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/solutions', function () {
    return view('solutions');
});

Route::get('/join', function () {
    return view('join');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/impact', function () {

    $waste = ImpactAction::sum('waste_kg');
    $carbon = ImpactAction::sum('carbon_kg');

    return view('impact', compact('waste', 'carbon'));
});

Route::post('/register', function (Request $request) {

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/join');
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

Route::post('/recycle', function (Request $request) {

    ImpactAction::create([
        'type' => 'recycle',
        'category' => $request->category,
        'waste_kg' => $request->waste_kg,
        'carbon_kg' => $request->carbon_kg,
    ]);

    return redirect('/impact');
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
        'message' => 'Message envoyé avec succès'
    ]);
});

Route::get('/assistant', [WasteController::class, 'index'])->name('assistant');
Route::post('/generate', [WasteController::class, 'generate'])->name('generate');
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');