<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['siteId'])) {
        $siteId = intval($_GET['siteId']);
        $stmt = $pdo->prepare("SELECT well_id, well_name FROM tbl_well WHERE site_id = :siteId");
        $stmt->bindParam(':siteId', $siteId, PDO::PARAM_INT);
        $stmt->execute();
        $wells = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(["status" => "success", "data" => $wells]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing siteId parameter."]);
    }
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}

?>
