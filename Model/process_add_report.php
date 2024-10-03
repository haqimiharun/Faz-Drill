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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryId'], $_POST['fieldId'], $_POST['siteId'], $_POST['wellId'], $_POST['wellboreId'], $_POST['reportName'])) {
        $countryId = intval($_POST['countryId']);
        $fieldId = intval($_POST['fieldId']);
        $siteId = intval($_POST['siteId']); 
        $wellId = intval($_POST['wellId']);
        $wellboreId = intval($_POST['wellboreId']);
        $reportName = trim($_POST['reportName']);

        if (!empty($reportName)) {
            // Check if the reportalready exists for the selected site
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_report WHERE wellbore_id = :wellboreId AND report_name = :reportName");
            $stmt->bindParam(':wellboreId', $wellboreId);
            $stmt->bindParam(':reportName', $reportName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Error: Report already exists for this wellbore.";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_report (country_id, field_id, site_id, well_id, wellbore_id, report_name) VALUES (:countryId, :fieldId, :siteId, :wellId, :wellboreId, :reportName)");
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':siteId', $siteId); // Corrected from siteName
                $stmt->bindParam(':wellId', $wellId);
                $stmt->bindParam(':wellboreId', $wellboreId);
                $stmt->bindParam(':reportName', $reportName);
                $stmt->execute();

                echo "Report added successfully!";
            }
        } else {
            echo "Error: Report name cannot be empty.";
        }
    } else {
        echo "Error: Invalid request. Please check your form fields.";
    }
} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}
?>

