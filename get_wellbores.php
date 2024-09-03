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
        $wellboreId = intval($_GET['id']); // Convert the ID to an integer for security

        // Prepare SQL statement to fetch wellbore name based on the wellbore ID
        $stmt = $pdo->prepare("SELECT wellbore_name FROM tbl_wellbore WHERE wellbore_id = :wellboreId LIMIT 1");
        $stmt->bindParam(':wellboreId', $wellboreId, PDO::PARAM_INT);
        $stmt->execute();
        $wellbore = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the wellbore was found and return the result
        if ($wellbore) {
            echo json_encode(["status" => "success", "wellbore_name" => $wellbore['wellbore_name']]);
        } else {
            echo json_encode(["status" => "error", "message" => "Wellbore not found for ID: {$wellboreId}"]);
        }
    } else {
        // Error if 'id' parameter is missing in the GET request
        echo json_encode(["status" => "error", "message" => "Missing wellbore ID parameter."]);
    }
} catch (PDOException $exception) {
    // Catch any PDO exceptions and return an error response
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . htmlspecialchars($exception->getMessage())]);
}
?>
