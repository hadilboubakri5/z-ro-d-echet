<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact - Ecological Impact Tracker</title>
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
            <h2>Your Environmental Impact</h2>
            <p>Track your progress toward zero waste and discover how your choices create real change</p>
        </section>

        <!-- Stats Grid -->
        <div id="statsContainer" class="stats-grid">
            <div class="loading">
                <div class="spinner"></div>
                <p>Loading your stats...</p>
            </div>
        </div>

        <!-- Charts Section -->
        <section class="charts-section">
            <h3>Your Progress Over Time</h3>
            <div class="charts-grid">
                <!-- Line Chart -->
                <div class="chart-container">
                    <h4>Waste & Emissions Reduction</h4>
                    <div class="chart-wrapper">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="chart-container">
                    <h4>Waste Breakdown</h4>
                    <div class="chart-wrapper">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="pie-legend">
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #22c55e;"></div>
                            <span>Food Waste <strong>35%</strong></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #16a34a;"></div>
                            <span>Plastic <strong>25%</strong></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #4ade80;"></div>
                            <span>Paper <strong>20%</strong></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #86efac;"></div>
                            <span>Other <strong>20%</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Achievements Section -->
        <section class="achievements-section">
            <h3>Achievements & Milestones</h3>
            <div id="achievementsContainer" class="achievements-grid">
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Loading achievements...</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div style="font-size: 2rem;">⚡</div>
            <h3>Ready to Make More Impact?</h3>
            <p>Every small action counts. Start tracking your waste today and join thousands making a real difference.</p>
            <button class="cta-button" onclick="handleCTA()">Start Tracking Now</button>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>Every action matters. Together, we're building a sustainable future.</p>
        <p>© 2024 Impact - Track Your Environmental Journey</p>
    </footer>

    <!-- JavaScript -->
    <script>
        const API_URL = 'api.php';

        // Load data from PHP API
        async function loadData() {
            try {
                const response = await fetch(API_URL);
                const data = await response.json();
                
                renderStats(data);
                renderCharts(data.monthly_data);
                renderAchievements(data.achievements);
            } catch (error) {
                console.error('Error loading data:', error);
                // Fallback to static data
                loadStaticData();
            }
        }

        // Render stats cards
        function renderStats(data) {
            const container = document.getElementById('statsContainer');
            container.innerHTML = `
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Waste Reduced</span>
                        <div class="stat-icon" style="background-color: #f0fdf4; color: #16a34a;">♻️</div>
                    </div>
                    <div class="stat-value">${data.waste_reduced.toFixed(1)}</div>
                    <div class="stat-unit">kg this month</div>
                    <div class="stat-trend trend-up">📈 15% improvement</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">CO2 Saved</span>
                        <div class="stat-icon" style="background-color: #ecfdf5; color: #059669;">💨</div>
                    </div>
                    <div class="stat-value">${data.co2_saved.toFixed(1)}</div>
                    <div class="stat-unit">kg equivalent</div>
                    <div class="stat-trend trend-up">📈 Like 2 trees planted</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Water Saved</span>
                        <div class="stat-icon" style="background-color: #ecf0ff; color: #0891b2;">💧</div>
                    </div>
                    <div class="stat-value">${data.water_saved.toLocaleString()}</div>
                    <div class="stat-unit">liters conserved</div>
                    <div class="stat-trend trend-up">📈 Equals 10 showers</div>
                </div>

                <div class="stat-card green-gradient">
                    <div class="stat-header">
                        <span class="stat-title">Current Streak</span>
                        <div class="stat-icon">🔥</div>
                    </div>
                    <div class="stat-value">${data.current_streak}</div>
                    <div class="stat-unit">days in a row</div>
                    <div class="stat-trend">✓ Keep it going!</div>
                </div>
            `;
        }

        // Render charts
        function renderCharts(monthlyData) {
            // Line Chart Data
            const lineChartData = {
                labels: monthlyData.map(d => d.month),
                datasets: [
                    {
                        label: 'Waste (kg)',
                        data: monthlyData.map(d => d.waste),
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
                        label: 'Carbon (kg CO2)',
                        data: monthlyData.map(d => d.carbon),
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

            // Initialize Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: lineChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: '#4b5563',
                                font: { size: 12 }
                            }
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

            // Pie Chart Data
            const pieChartData = {
                labels: ['Food Waste', 'Plastic', 'Paper', 'Other'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: ['#22c55e', '#16a34a', '#4ade80', '#86efac'],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            };

            // Initialize Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'doughnut',
                data: pieChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        // Render achievements
        function renderAchievements(achievements) {
            const container = document.getElementById('achievementsContainer');
            container.innerHTML = achievements.map(achievement => `
                <div class="achievement-card ${achievement.unlocked ? 'unlocked' : 'locked'}" onclick="unlockAchievement(${achievement.id})">
                    <div class="achievement-header">
                        <div class="achievement-icon">${achievement.unlocked ? '🏆' : '🎯'}</div>
                        <div class="achievement-info">
                            <div class="achievement-title">${achievement.title}</div>
                            <div class="achievement-description">${achievement.description}</div>
                            ${achievement.unlocked ? '<div class="achievement-badge">✓ Unlocked</div>' : ''}
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Unlock achievement via API
        async function unlockAchievement(achievementId) {
            try {
                const response = await fetch(API_URL + '?action=unlock-achievement', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ achievement_id: achievementId })
                });
                const result = await response.json();
                if (result.success) {
                    loadData(); // Reload data
                }
            } catch (error) {
                console.error('Error unlocking achievement:', error);
            }
        }

        // Fallback static data
        function loadStaticData() {
            const staticData = {
                waste_reduced: 127.5,
                co2_saved: 89.3,
                water_saved: 2450,
                current_streak: 45,
                monthly_data: [
                    { month: 'Jan', waste: 45, carbon: 32 },
                    { month: 'Feb', waste: 38, carbon: 28 },
                    { month: 'Mar', waste: 32, carbon: 24 },
                    { month: 'Apr', waste: 28, carbon: 20 },
                    { month: 'May', waste: 22, carbon: 16 },
                    { month: 'Jun', waste: 18, carbon: 12 }
                ],
                achievements: [
                    { id: 1, title: 'First Step', description: 'Started tracking waste', unlocked: true },
                    { id: 2, title: '30-Day Warrior', description: '30 days of tracking', unlocked: true },
                    { id: 3, title: 'Eco Champion', description: '50% waste reduction', unlocked: true },
                    { id: 4, title: 'Zero Waste Hero', description: '90-day streak', unlocked: false },
                    { id: 5, title: 'Planet Saver', description: '1 ton CO2 saved', unlocked: false },
                    { id: 6, title: 'Legend Status', description: '1-year commitment', unlocked: false }
                ]
            };
            
            renderStats(staticData);
            renderCharts(staticData.monthly_data);
            renderAchievements(staticData.achievements);
        }

        // CTA Button Handler
        function handleCTA() {
            alert('Welcome to Impact! Start your zero-waste journey today. 🌿');
        }

        // Navigate to home
        function navigateToHome() {
            window.location.href = '/';
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', loadData);
    </script>
</body>
</html>
