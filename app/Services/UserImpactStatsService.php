<?php

namespace App\Services;

use App\Models\ImpactAction;
use App\Models\User;
use Carbon\Carbon;

class UserImpactStatsService
{
    /** @var array<string, string> */
    protected array $categoryLabels = [
        'plastic' => 'Plastique',
        'glass' => 'Verre',
        'paper' => 'Papier / carton',
        'food' => 'Alimentaire',
        'other' => 'Autre',
        'recycle' => 'Recyclage',
        'general' => 'Conseils',
    ];

    /** @return array{articles_scannes: int, dechets_kg: float, conseils_appliques: int} */
    public function summary(User $user): array
    {
        $uid = $user->id;

        return [
            'articles_scannes' => ImpactAction::where('user_id', $uid)->where('type', 'scan')->count(),
            'dechets_kg' => round((float) ImpactAction::where('user_id', $uid)->sum('waste_kg'), 2),
            'conseils_appliques' => ImpactAction::where('user_id', $uid)->where('type', 'assistant')->count(),
        ];
    }

    /**
     * Payload JSON pour la page Impact (graphiques + cartes).
     *
     * @return array<string, mixed>
     */
    public function impactPagePayload(User $user): array
    {
        $uid = $user->id;
        $totalWaste = (float) ImpactAction::where('user_id', $uid)->sum('waste_kg');
        $totalCarbon = (float) ImpactAction::where('user_id', $uid)->sum('carbon_kg');
        $scanCount = ImpactAction::where('user_id', $uid)->where('type', 'scan')->count();
        $tipsCount = ImpactAction::where('user_id', $uid)->where('type', 'assistant')->count();

        return [
            'articles_scannes' => $scanCount,
            'dechets_kg' => round($totalWaste, 2),
            'conseils_appliques' => $tipsCount,
            'waste_reduced' => round($totalWaste, 2),
            'co2_saved' => round($totalCarbon, 2),
            'water_saved' => round($totalWaste * 8, 1),
            'current_streak' => $this->activityStreak($user),
            'monthly_data' => $this->monthlySeries($user, 6),
            'category_breakdown' => $this->categoryBreakdown($user),
            'achievements' => $this->achievements($scanCount, $tipsCount, $totalWaste),
        ];
    }

    /** @return list<array{month: string, waste: float, carbon: float}> */
    protected function monthlySeries(User $user, int $months): array
    {
        $out = [];
        for ($i = $months - 1; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();

            $waste = (float) ImpactAction::where('user_id', $user->id)
                ->whereBetween('created_at', [$start, $end])
                ->sum('waste_kg');

            $carbon = (float) ImpactAction::where('user_id', $user->id)
                ->whereBetween('created_at', [$start, $end])
                ->sum('carbon_kg');

            $out[] = [
                'month' => $this->frenchMonthShort($month),
                'waste' => round($waste, 2),
                'carbon' => round($carbon, 2),
            ];
        }

        return $out;
    }

    protected function frenchMonthShort(Carbon $date): string
    {
        $months = ['janv.', 'févr.', 'mars', 'avr.', 'mai', 'juin', 'juill.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'];

        return $months[(int) $date->format('n') - 1];
    }

    /** @return list<array{key: string, label: string, waste: float, percent: float}> */
    protected function categoryBreakdown(User $user): array
    {
        $rows = ImpactAction::query()
            ->where('user_id', $user->id)
            ->where('type', 'scan')
            ->selectRaw('category, SUM(waste_kg) as total')
            ->groupBy('category')
            ->get();

        $total = (float) $rows->sum('total');
        $out = [];

        foreach ($rows as $row) {
            $key = (string) $row->category;
            $waste = (float) $row->total;
            $out[] = [
                'key' => $key,
                'label' => $this->categoryLabels[$key] ?? ucfirst($key),
                'waste' => round($waste, 2),
                'percent' => $total > 0 ? round(100 * $waste / $total, 1) : 0.0,
            ];
        }

        if ($out === []) {
            $out[] = [
                'key' => 'other',
                'label' => 'Pas encore de scans',
                'waste' => 0.0,
                'percent' => 100.0,
            ];
        }

        return $out;
    }

    /** @return list<array{id: int, title: string, description: string, unlocked: bool}> */
    protected function achievements(int $scanCount, int $tipsCount, float $totalWaste): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Premier pas',
                'description' => 'Vous avez enregistré au moins un scan.',
                'unlocked' => $scanCount >= 1,
            ],
            [
                'id' => 2,
                'title' => 'Curieux du rayon',
                'description' => '5 produits scannés.',
                'unlocked' => $scanCount >= 5,
            ],
            [
                'id' => 3,
                'title' => 'En route vers le zéro déchet',
                'description' => '10 scans enregistrés.',
                'unlocked' => $scanCount >= 10,
            ],
            [
                'id' => 4,
                'title' => 'Conseils suivis',
                'description' => '3 sessions avec l’assistant conseils.',
                'unlocked' => $tipsCount >= 3,
            ],
            [
                'id' => 5,
                'title' => 'Impact mesuré',
                'description' => 'Plus de 5 kg de « déchet évité » cumulés (estimation).',
                'unlocked' => $totalWaste >= 5,
            ],
        ];
    }

    protected function activityStreak(User $user): int
    {
        $streak = 0;
        $d = Carbon::today();

        while (ImpactAction::where('user_id', $user->id)->whereDate('created_at', $d)->exists()) {
            $streak++;
            $d = $d->subDay();
        }

        return $streak;
    }
}
