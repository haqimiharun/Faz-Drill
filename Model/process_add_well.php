<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';;
$dbpass = 'ftsb@123';

try {
    // Establish the database connection
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryId'], $_POST['fieldId'], $_POST['siteId'], $_POST['wellName'])) {
        $countryId = intval($_POST['countryId']);
        $fieldId = intval($_POST['fieldId']);
        $siteId = intval($_POST['siteId']); // Corrected from siteName
        $wellName = trim($_POST['wellName']);

        if (!empty($wellName)) {
            // Check if the well already exists for the selected site
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_well WHERE site_id = :siteId AND well_name = :wellName");
            $stmt->bindParam(':siteId', $siteId);
            $stmt->bindParam(':wellName', $wellName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Error: Well already exists for this site.";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_well (country_id, field_id, site_id, well_name) VALUES (:countryId, :fieldId, :siteId, :wellName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':siteId', $siteId); // Corrected from siteName
                $stmt->bindParam(':wellName', $wellName);
                $stmt->execute();

                echo "Well added successfully!";
            }
        } else {
            echo "Error: Well name cannot be empty.";
        }
    } else {
        echo "Error: Invalid request. Please check your form fields.";
    }
} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}
?>

