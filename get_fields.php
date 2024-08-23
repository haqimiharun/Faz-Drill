<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['countryId'])) {
        $countryId = intval($_GET['countryId']);
        $stmt = $pdo->prepare("SELECT field_id, field_name FROM tbl_field WHERE country_id = :countryId");
        $stmt->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(["status" => "success", "data" => $fields]);
    } else {
        echo json_encode(["status" => "error", "message" => "Missing countryId parameter."]);
    }
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}

?>
