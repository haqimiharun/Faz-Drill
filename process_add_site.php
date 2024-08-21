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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryId'], $_POST['fieldId'], $_POST['siteName'])) {
        $countryId = intval($_POST['countryId']);
        $fieldId = intval($_POST['fieldId']);
        $siteName = trim($_POST['siteName']);

        if (!empty($siteName)) {
            // Check if the site already exists for the selected field
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_site WHERE field_id = :fieldId AND site_name = :siteName");
            $stmt->bindParam(':fieldId', $fieldId);
            $stmt->bindParam(':siteName', $siteName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Error: Site already exists for this field.";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_site (country_id, field_id, site_name) VALUES (:countryId, :fieldId, :siteName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':siteName', $siteName);
                $stmt->execute();

                echo "Site added successfully!";
            }
        } else {
            echo "Error: Site name cannot be empty.";
        }
    } else {
        echo "Error: Invalid request.";
    }
} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}
?>
