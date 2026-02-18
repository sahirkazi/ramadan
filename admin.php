<?php
session_start();
$valid_password = "Sahir@#321"; // Change this password!

if (isset($_POST['password']) && $_POST['password'] === $valid_password) {
    $_SESSION['logged_in'] = true;
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                background: #121212;
                color: #fff;
                font-family: sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            form {
                background: #1e1e1e;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
                text-align: center;
            }

            input {
                padding: 10px;
                border-radius: 4px;
                border: 1px solid #333;
                background: #2d2d2d;
                color: #fff;
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
            }

            button {
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                background: #10b981;
                color: white;
                cursor: pointer;
                font-weight: bold;
                width: 100%;
            }

            button:hover {
                background: #059669;
            }
        </style>
    </head>

    <body>
        <form method="post">
            <h2 style="margin-top:0">Admin Login</h2>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </body>

    </html>
    <?php
    exit;
}

// Analytics Logic
$dbFile = __DIR__ . '/analytics.db';
try {
    $pdo = new PDO("sqlite:$dbFile");

    // Total Visitors (Unique IPs)
    $stmt = $pdo->query("SELECT COUNT(DISTINCT ip_hash) FROM page_views");
    $totalVisitors = $stmt->fetchColumn();

    // Total Page Views
    $stmt = $pdo->query("SELECT COUNT(*) FROM page_views");
    $totalPageViews = $stmt->fetchColumn();

    // Live Users (Last 5 Minutes)
    $stmt = $pdo->query("SELECT COUNT(DISTINCT ip_hash) FROM page_views WHERE timestamp >= datetime('now', '-5 minutes')");
    $liveUsers = $stmt->fetchColumn();

    // Today's Visitors
    $stmt = $pdo->query("SELECT COUNT(DISTINCT ip_hash) FROM page_views WHERE date(timestamp) = date('now')");
    $todayVisitors = $stmt->fetchColumn();

    // Total Installs
    $stmt = $pdo->query("SELECT COUNT(*) FROM app_installs");
    $totalInstalls = $stmt->fetchColumn();

    // Recent Activity
    $stmt = $pdo->query("SELECT * FROM page_views ORDER BY timestamp DESC LIMIT 20");
    $recentActivity = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Database error: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramadan App Analytics</title>
    <style>
        :root {
            --bg: #121212;
            --card-bg: #1e1e1e;
            --text: #e5e5e5;
            --primary: #10b981;
            --accent: #f59e0b;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: var(--primary);
            margin-bottom: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 10px 0;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table-wrap {
            overflow-x: auto;
            background: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #333;
        }

        th {
            color: var(--accent);
            font-weight: 600;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .live-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            background: #ef4444;
            border-radius: 50%;
            margin-right: 5px;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.4;
            }

            100% {
                opacity: 1;
            }
        }

        .btn-logout {
            background: #dc2626;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            float: right;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="?logout=1" class="btn-logout" onclick="<?php if (isset($_GET['logout'])) {
            session_destroy();
            header('Location: admin.php');
        } ?>">Logout</a>
        <h1>📊 App Analytics</h1>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label"><span class="live-indicator"></span> Live Users</div>
                <div class="stat-value" style="color:#ef4444">
                    <?php echo $liveUsers; ?>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Today's Visitors</div>
                <div class="stat-value">
                    <?php echo $todayVisitors; ?>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Unique Visitors</div>
                <div class="stat-value">
                    <?php echo $totalVisitors; ?>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Page Views</div>
                <div class="stat-value" style="color:#3b82f6">
                    <?php echo $totalPageViews; ?>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">App Installs</div>
                <div class="stat-value" style="color:var(--accent)">
                    <?php echo $totalInstalls; ?>
                </div>
            </div>
        </div>

        <h3 style="margin-bottom:15px">Recent Activity</h3>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Page</th>
                        <th>User Agent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentActivity as $row): ?>
                        <tr>
                            <td>
                                <?php echo date('d M H:i:s', strtotime($row['timestamp'])); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($row['page']); ?>
                            </td>
                            <td style="font-size:0.85rem;color:#999">
                                <?php echo htmlspecialchars(substr($row['user_agent'], 0, 50)); ?>...
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Auto refresh every 30 seconds
        setTimeout(() => window.location.reload(), 30000);
    </script>
</body>

</html>