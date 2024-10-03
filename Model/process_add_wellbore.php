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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryId'], $_POST['fieldId'], $_POST['siteId'], $_POST['wellId'], $_POST['wellboreName'])) {
        $countryId = intval($_POST['countryId']);
        $fieldId = intval($_POST['fieldId']);
        $siteId = intval($_POST['siteId']); 
        $wellId = intval($_POST['wellId']);
        $wellboreName = trim($_POST['wellboreName']);

        if (!empty($wellboreName)) {
            // Check if the wellbore already exists for the selected site
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_wellbore WHERE well_id = :wellId AND wellbore_name = :wellboreName");
            $stmt->bindParam(':wellId', $wellId);
            $stmt->bindParam(':wellboreName', $wellboreName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Error: Wellbore already exists for this site.";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_wellbore (country_id, field_id, site_id, well_id, wellbore_name) VALUES (:countryId, :fieldId, :siteId, :wellId, :wellboreName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':siteId', $siteId); // Corrected from siteName
                $stmt->bindParam(':wellId', $wellId);
                $stmt->bindParam(':wellboreName', $wellboreName);
                $stmt->execute();

                echo "Wellbore added successfully!";
            }
        } else {
            echo "Error: Wellbore name cannot be empty.";
        }
    } else {
        echo "Error: Invalid request. Please check your form fields.";
    }
} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}
?>

