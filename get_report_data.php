<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['reportId'])) {
        $reportId = intval($_GET['reportId']);
        // Replace with your actual query to fetch report data based on reportId
        $stmt = $pdo->prepare("SELECT * FROM tbl_report WHERE report_id = :reportId");
        $stmt->bindParam(':reportId', $reportId, PDO::PARAM_INT);
        $stmt->execute();
        $reportData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($reportData) {
            echo json_encode(["status" => "success", "data" => $reportData]);
        } else {
            echo json_encode(["status" => "error", "message" => "No data found for the given reportId."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Missing reportId parameter."]);
    }
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
