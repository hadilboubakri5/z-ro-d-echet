<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact — Zéro Déchet</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #f0f9ff, #f0fdf4, #ffffff);
            color: #1f2937;
        }

        /* Header */
        header {
            background: white;
            border-bottom: 1px solid #dcfce7;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .brand-title {
            font-size: 24px;
            font-weight: bold;
            color: #15803d;
        }

        nav {
            display: flex;
            gap: 2rem;
            font-size: 14px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 2rem;
            font-size: 14px;
        }

        nav button {
            background: none;
            border: none;
            cursor: pointer;
            color: #4b5563;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav button:first-child {
            color: #16a34a;
        }

        nav button:hover {
            color: #15803d;
        }

        .btn-home {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white !important;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
            color: white !important;
        }

        .btn-home:active {
            transform: translateY(0);
        }

        /* Main Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Hero Section */
        .hero {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .hero h2 {
            font-size: clamp(2rem, 5vw, 3rem);
            color: #15803d;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.1rem;
            color: #16a34a;
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #dcfce7;
            transition: box-shadow 0.3s;
        }

        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .stat-card.green-gradient {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            border: none;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-title {
            font-size: 0.95rem;
            font-weight: 500;
            opacity: 0.9;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background: rgba(255, 255, 255, 0.1);
        }

        .stat-card:not(.green-gradient) .stat-icon {
            background-color: #f0fdf4;
        }

        .stat-value {
            font-size: clamp(2rem, 8vw, 2.5rem);
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-unit {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .stat-trend {
            font-size: 0.8rem;
            margin-top: 0.5rem;
            opacity: 0.85;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .trend-up {
            color: #16a34a;
        }

        .stat-card.green-gradient .stat-trend {
            color: #fbbf24;
        }

        /* Loading */
        .loading {
            text-align: center;
            padding: 2rem;
            color: #16a34a;
        }

        .spinner {
            border: 4px solid #f0fdf4;
            border-top: 4px solid #22c55e;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Charts Section */
        .charts-section {
            background: white;
            border-top: 1px solid #dcfce7;
            border-bottom: 1px solid #dcfce7;
            padding: 3rem 1.5rem;
            margin: 2rem 0;
        }

        .charts-section h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #111827;
            margin-bottom: 2rem;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        .chart-container {
            background: linear-gradient(to bottom right, #f0fdf4, #f0f9ff);
            border-radius: 1rem;
            padding: 2rem;
        }

        .chart-container h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 1.5rem;
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
            margin-bottom: 1rem;
        }

        .pie-legend {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
        }

        /* Achievements Section */
        .achievements-section {
            padding: 3rem 1.5rem;
        }

        .achievements-section h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #111827;
            margin-bottom: 2rem;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        .achievement-card {
            border-radius: 1rem;
            padding: 1.5rem;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            transition: all 0.3s;
            cursor: pointer;
        }

        .achievement-card.unlocked {
            background: linear-gradient(to bottom right, #fef3c7, #fef08a);
            border-color: #fcd34d;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .achievement-card.locked {
            opacity: 0.6;
        }

        .achievement-header {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .achievement-icon {
            width: 56px;
            height: 56px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 28px;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: white;
        }

        .achievement-card.locked .achievement-icon {
            background: #d1d5db;
        }

        .achievement-info {
            flex: 1;
        }

        .achievement-title {
            font-weight: bold;
            margin-bottom: 0.25rem;
            color: #78350f;
        }

        .achievement-card.locked .achievement-title {
            color: #6b7280;
        }

        .achievement-description {
            font-size: 0.9rem;
            color: #b45309;
            margin-bottom: 0.5rem;
        }

        .achievement-card.locked .achievement-description {
            color: #9ca3af;
        }

        .achievement-badge {
            font-size: 0.75rem;
            color: #16a34a;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 3rem 1.5rem;
            margin: 2rem 0;
            border-radius: 1rem;
            text-align: center;
        }

        .cta-section h3 {
            font-size: 2rem;
            margin: 1rem 0;
            font-weight: bold;
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            background: white;
            color: #16a34a;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            background: #f0fdf4;
        }

        /* Footer */
        footer {
            background: white;
            border-top: 1px solid #dcfce7;
            padding: 2rem 1.5rem;
            text-align: center;
            color: #6b7280;
            font-size: 0.9rem;
        }

        footer p:first-child {
            margin-bottom: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }

            nav {
                gap: 1rem;
                font-size: 12px;
            }

            .hero h2 {
                font-size: 1.75rem;
            }

            .hero {
                padding: 2rem 1rem;
            }

            .achievement-icon {
                width: 48px;
                height: 48px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="brand">
                <div class="brand-icon">🌿</div>
                <h1 class="brand-title">Impact</h1>
            </div>
            <nav>
                <button onclick="navigateToHome()">Dashboard</button>
                <button>Settings</button>
                <button>Profile</button>
                <button class="btn-home" onclick="navigateToHome()">← Retour à l'accueil</button>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Hero Section -->
        <section class="hero">
            <h2>Votre impact environnemental</h2>
            <p>Les graphiques se mettent à jour selon vos scans (tableau de bord → scanner) et les conseils obtenus via l’assistant.</p>
        </section>

        <!-- Stats Grid -->
        <div id="statsContainer" class="stats-grid"></div>

        <!-- Charts Section -->
        <section class="charts-section">
            <h3>Votre progression dans le temps</h3>
            <div class="charts-grid">
                <!-- Line Chart -->
                <div class="chart-container">
                    <h4>Déchet estimé &amp; CO₂ (par mois)</h4>
                    <div class="chart-wrapper">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="chart-container">
                    <h4>Répartition par type (scans)</h4>
                    <div class="chart-wrapper">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div id="pieLegend" class="pie-legend"></div>
                </div>
            </div>
        </section>

        <!-- Achievements Section -->
        <section class="achievements-section">
            <h3>Objectifs &amp; jalons</h3>
            <div id="achievementsContainer" class="achievements-grid"></div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div style="font-size: 2rem;">⚡</div>
            <h3>Continuer à réduire vos déchets</h3>
            <p>Chaque scan enrichit vos statistiques : ouvrez le scanner depuis le tableau de bord.</p>
            <button type="button" class="cta-button" onclick="handleCTA()">Scanner un produit</button>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>Chaque geste compte. Ensemble vers moins de déchet.</p>
        <p>© 2026 Zéro Déchet — Suivi d’impact personnel</p>
    </footer>

    <!-- Données injectées par Laravel + Chart.js -->
    <script>
        window.__IMPACT_STATS__ = @json($impactStats ?? []);

        let lineChartInstance = null;
        let pieChartInstance = null;

        const PIE_COLORS = ['#22c55e', '#16a34a', '#4ade80', '#86efac', '#15803d', '#059669', '#10b981'];

        function renderStats(data) {
            const container = document.getElementById('statsContainer');
            const scans = data.articles_scannes ?? 0;
            const tips = data.conseils_appliques ?? 0;
            container.innerHTML = `
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Déchet évité (cumul)</span>
                        <div class="stat-icon" style="background-color: #f0fdf4; color: #16a34a;">♻️</div>
                    </div>
                    <div class="stat-value">${Number(data.waste_reduced ?? 0).toFixed(1)}</div>
                    <div class="stat-unit">kg estimés (tous scans)</div>
                    <div class="stat-trend trend-up">${scans} scan(s) enregistré(s)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">CO₂ associé</span>
                        <div class="stat-icon" style="background-color: #ecfdf5; color: #059669;">💨</div>
                    </div>
                    <div class="stat-value">${Number(data.co2_saved ?? 0).toFixed(1)}</div>
                    <div class="stat-unit">kg équivalent CO₂</div>
                    <div class="stat-trend trend-up">Basé sur le même modèle que le scan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Eau (ordre de grandeur)</span>
                        <div class="stat-icon" style="background-color: #ecf0ff; color: #0891b2;">💧</div>
                    </div>
                    <div class="stat-value">${Number(data.water_saved ?? 0).toLocaleString('fr-FR')}</div>
                    <div class="stat-unit">litres indicatifs (×8 sur le kg évité)</div>
                    <div class="stat-trend trend-up">Heuristique simplifiée</div>
                </div>
                <div class="stat-card green-gradient">
                    <div class="stat-header">
                        <span class="stat-title">Série active</span>
                        <div class="stat-icon">🔥</div>
                    </div>
                    <div class="stat-value">${data.current_streak ?? 0}</div>
                    <div class="stat-unit">jour(s) consécutif(s) avec au moins une action</div>
                    <div class="stat-trend">${tips} conseil(s) assistant</div>
                </div>
            `;
        }

        function renderCharts(data) {
            const monthlyData = data.monthly_data || [];
            const breakdown = data.category_breakdown || [];

            const lineChartData = {
                labels: monthlyData.map(function (d) { return d.month; }),
                datasets: [
                    {
                        label: 'Déchet (kg)',
                        data: monthlyData.map(function (d) { return d.waste; }),
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 5,
                        pointBackgroundColor: '#22c55e',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'Carbone (kg CO₂)',
                        data: monthlyData.map(function (d) { return d.carbon; }),
                        borderColor: '#0891b2',
                        backgroundColor: 'rgba(8, 145, 178, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 5,
                        pointBackgroundColor: '#0891b2',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }
                ]
            };

            const lineCtx = document.getElementById('lineChart').getContext('2d');
            if (lineChartInstance) lineChartInstance.destroy();
            lineChartInstance = new Chart(lineCtx, {
                type: 'line',
                data: lineChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            labels: { color: '#4b5563', font: { size: 12 } }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { color: '#6b7280' },
                            grid: { color: 'rgba(0, 0, 0, 0.05)' }
                        },
                        x: {
                            ticks: { color: '#6b7280' },
                            grid: { color: 'rgba(0, 0, 0, 0.05)' }
                        }
                    }
                }
            });

            const pieLabels = breakdown.map(function (b) { return b.label; });
            const pieValues = breakdown.map(function (b) { return Math.max(b.percent, 0); });
            const pieColors = breakdown.map(function (_, i) { return PIE_COLORS[i % PIE_COLORS.length]; });

            const legendEl = document.getElementById('pieLegend');
            if (legendEl) {
                legendEl.innerHTML = breakdown.map(function (b, i) {
                    return '<div class="legend-item">' +
                        '<div class="legend-color" style="background-color:' + pieColors[i] + ';"></div>' +
                        '<span>' + b.label + ' <strong>' + b.percent.toFixed(1) + '%</strong></span>' +
                        '</div>';
                }).join('');
            }

            const pieCtx = document.getElementById('pieChart').getContext('2d');
            if (pieChartInstance) pieChartInstance.destroy();
            pieChartInstance = new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: pieLabels,
                    datasets: [{
                        data: pieValues,
                        backgroundColor: pieColors,
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        }

        function renderAchievements(achievements) {
            const container = document.getElementById('achievementsContainer');
            const list = achievements || [];
            container.innerHTML = list.map(function (achievement) {
                return '<div class="achievement-card ' + (achievement.unlocked ? 'unlocked' : 'locked') + '">' +
                    '<div class="achievement-header">' +
                    '<div class="achievement-icon">' + (achievement.unlocked ? '🏆' : '🎯') + '</div>' +
                    '<div class="achievement-info">' +
                    '<div class="achievement-title">' + achievement.title + '</div>' +
                    '<div class="achievement-description">' + achievement.description + '</div>' +
                    (achievement.unlocked ? '<div class="achievement-badge">✓ Débloqué</div>' : '') +
                    '</div></div></div>';
            }).join('');
        }

        function handleCTA() {
            window.location.href = @json(route('scan'));
        }

        function navigateToHome() {
            window.location.href = @json(route('dashboard'));
        }

        document.addEventListener('DOMContentLoaded', function () {
            var data = window.__IMPACT_STATS__ || {};
            renderStats(data);
            renderCharts(data);
            renderAchievements(data.achievements || []);
        });
    </script>
</body>
</html>
