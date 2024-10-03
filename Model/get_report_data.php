<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['wellboreId'])) {
        $wellboreId = intval($_GET['wellboreId']);
        $stmt = $pdo->prepare("SELECT * FROM tbl_report WHERE wellbore_id = :wellboreId");
        $stmt->bindParam(':wellboreId', $wellboreId, PDO::PARAM_INT);
        $stmt->execute();
        $reportData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(["status" => "success", "data" => $reportData]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing wellboreId parameter."]);
    }
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . htmlspecialchars($exception->getMessage())]);
}
?>
