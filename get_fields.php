<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if fieldId is provided in the query string
    if (isset($_GET['id'])) {
        $fieldId = intval($_GET['id']);

        // Prepare and execute the query to fetch the field name
        $stmt = $pdo->prepare("SELECT field_name FROM tbl_field WHERE field_id = :fieldId");
        $stmt->bindParam(':fieldId', $fieldId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch the result
        $field = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if field data is found
        if ($field) {
            header('Content-Type: application/json');
            echo json_encode($field);
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Field not found"]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "No fieldId provided"]);
    }
} catch (PDOException $exception) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
