<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Establish the database connection
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from POST request
    $fieldId = isset($_POST['fieldId']) ? $_POST['fieldId'] : null;
    $fieldName = isset($_POST['fieldName']) ? $_POST['fieldName'] : null;

    // Check if both fieldId and fieldName are provided
    if (!$fieldId || !$fieldName) {
        echo json_encode(["success" => false, "error" => "Missing required parameters"]);
        exit;
    }

    // Prepare the SQL statement for updating the field name
    $sql = "UPDATE tbl_field SET field_name = :fieldName WHERE field_id = :fieldId";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters to the query
    $stmt->bindParam(':fieldName', $fieldName, PDO::PARAM_STR);
    $stmt->bindParam(':fieldId', $fieldId, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Field updated successfully"]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to update field"]);
    }
    
} catch (PDOException $exception) {
    echo json_encode(["success" => false, "error" => "Database error: " . $exception->getMessage()]);
}
?>
