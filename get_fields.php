<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

header('Content-Type: application/json'); // Set content type to JSON

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['country_id'])) {
        $countryId = intval($_GET['country_id']);

        // Fetch fields for the specified country
        $stmt = $pdo->prepare("SELECT field_id, field_name FROM tbl_field WHERE country_id = :country_id");
        $stmt->bindParam(':country_id', $countryId, PDO::PARAM_INT);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return JSON response
        echo json_encode(["status" => "success", "data" => $fields]);

    } else {
        echo json_encode(["status" => "error", "message" => "Missing country_id parameter."]);
    }
} catch (PDOException $exception) {
    // Return error response with HTTP status code 500
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
