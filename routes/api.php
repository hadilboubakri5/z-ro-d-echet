<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProduitController;
use App\Models\ImpactAction;

Route::get('/produits/scan/{codeBarre}', [ProduitController::class, 'scan']);

Route::get('/impact-stats', function () {
    $monthly = ImpactAction::selectRaw("DATE_FORMAT(created_at, '%b') as month, SUM(waste_kg) as waste, SUM(carbon_kg) as carbon")
        ->groupBy('month')
        ->orderByRaw('MIN(created_at)')
        ->get();

    return response()->json([
        'waste_reduced' => round(ImpactAction::sum('waste_kg'), 2),
        'co2_saved' => round(ImpactAction::sum('carbon_kg'), 2),
        'water_saved' => round(ImpactAction::sum('waste_kg') * 8, 1),
        'current_streak' => 0,
        'monthly_data' => $monthly,
        'achievements' => [
            ['id' => 1, 'title' => 'Premier scan', 'description' => 'Vous avez commencé à suivre votre impact', 'unlocked' => ImpactAction::count() > 0],
            ['id' => 2, 'title' => 'Plusieurs produits', 'description' => 'Vous avez scanné plusieurs produits', 'unlocked' => ImpactAction::count() >= 5],
            ['id' => 3, 'title' => 'Bon départ', 'description' => 'Impact enregistré pour 10 produits', 'unlocked' => ImpactAction::count() >= 10],
        ],
    ]);
});