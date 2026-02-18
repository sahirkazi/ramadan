<?php
// analytics.php - Handles tracking requests

// Set content type to JSON
header('Content-Type: application/json');

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Database file path
$dbFile = __DIR__ . '/analytics.db';

try {
    // Connect to SQLite database
    $pdo = new PDO("sqlite:$dbFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS page_views (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        ip_hash TEXT NOT NULL,
        user_agent TEXT,
        page TEXT,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS app_installs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        ip_hash TEXT NOT NULL,
        user_agent TEXT,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Get input data
    $data = json_decode(file_get_contents('php://input'), true);

    // If no JSON input, try POST/GET parameters (fallback)
    if (!$data) {
        $data = $_REQUEST;
    }

    $event = isset($data['event']) ? $data['event'] : '';

    // Get visitor info
    $ip = $_SERVER['REMOTE_ADDR'];
    // Hash IP for privacy (simple MD5 + salt if needed, here just MD5 for simplicity)
    $ipHash = md5($ip . 'ramadan_salt');
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $page = isset($data['page']) ? $data['page'] : 'unknown';

    if ($event === 'page_view') {
        $stmt = $pdo->prepare("INSERT INTO page_views (ip_hash, user_agent, page) VALUES (:ip, :ua, :page)");
        $stmt->execute([':ip' => $ipHash, ':ua' => $userAgent, ':page' => $page]);
        echo json_encode(['status' => 'success', 'message' => 'Page view logged']);
    } elseif ($event === 'install') {
        $stmt = $pdo->prepare("INSERT INTO app_installs (ip_hash, user_agent) VALUES (:ip, :ua)");
        $stmt->execute([':ip' => $ipHash, ':ua' => $userAgent]);
        echo json_encode(['status' => 'success', 'message' => 'Install logged']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid event']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>