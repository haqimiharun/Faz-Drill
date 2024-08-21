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
                echo "Error: Field already exists for this country.";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_field (country_id, field_name) VALUES (:countryId, :fieldName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldName', $fieldName);
                $stmt->execute();

                echo "Field added successfully!";
            }
        } else {
            echo "Error: Field name cannot be empty.";
        }
    } else {
        echo "Error: Invalid request.";
    }
} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}
?>
