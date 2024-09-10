<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['wellId'])) {
        $wellId = intval($_GET['wellId']);
        $stmt = $pdo->prepare("SELECT wellbore_id, wellbore_name FROM tbl_wellbore WHERE well_Id = :wellId");
        $stmt->bindParam(':wellId', $wellId, PDO::PARAM_INT);
        $stmt->execute();
        $wellbores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(["status" => "success", "data" => $wellbores]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing wellId parameter."]);
    }
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}

?>
