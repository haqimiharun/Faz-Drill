<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Establish a new database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if 'id' parameter is set in the GET request
    if (isset($_GET['id'])) {
        $wellId = intval($_GET['id']); // Convert the ID to an integer for security

        // Prepare SQL statement to fetch well name based on the well ID
        $stmt = $pdo->prepare("SELECT well_name FROM tbl_well WHERE well_id = :wellId LIMIT 1");
        $stmt->bindParam(':wellId', $wellId, PDO::PARAM_INT);
        $stmt->execute();
        $well = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the well was found and return the result
        if ($well) {
            echo json_encode(["status" => "success", "well_name" => $well['well_name']]);
        } else {
            echo json_encode(["status" => "error", "message" => "Well not found for ID: {$wellId}"]);
        }
    } else {
        // Error if 'id' parameter is missing in the GET request
        echo json_encode(["status" => "error", "message" => "Missing well ID parameter."]);
    }
} catch (PDOException $exception) {
    // Catch any PDO exceptions and return an error response
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . htmlspecialchars($exception->getMessage())]);
}
?>