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

    $response = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryId'], $_POST['fieldName'])) {
        $countryId = intval($_POST['countryId']);
        $fieldName = trim($_POST['fieldName']);

        if (!empty($fieldName)) {
            // Check if the field already exists for the selected country
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_field WHERE country_id = :countryId AND field_name = :fieldName");
            $stmt->bindParam(':countryId', $countryId);
            $stmt->bindParam(':fieldName', $fieldName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                // If the field already exists, send an error response
                $response['status'] = 'error';
                $response['message'] = 'Error: Field already exists for this country.';
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_field (country_id, field_name) VALUES (:countryId, :fieldName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldName', $fieldName);
                $stmt->execute();

                // Send success response with the added field data
                $response['status'] = 'success';
                $response['message'] = 'Field added successfully!';
                $response['field'] = [
                    'field_id' => $pdo->lastInsertId(),
                    'field_name' => $fieldName,
                    'country_id' => $countryId
                ];
            }
        } else {
            // Handle empty field name
            $response['status'] = 'error';
            $response['message'] = 'Error: Field name cannot be empty.';
        }
    } else {
        // Handle invalid request
        $response['status'] = 'error';
        $response['message'] = 'Error: Invalid request.';
    }

    // Return the response as JSON
    echo json_encode($response);

} catch (PDOException $exception) {
    // Catch and return any database errors
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . htmlspecialchars($exception->getMessage());
    echo json_encode($response);
}
?>
