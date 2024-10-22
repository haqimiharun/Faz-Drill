<?php
header('Content-Type: application/json');

// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';;
$dbpass = 'ftsb@123';

$response = array();

try {
    // Establish the database connection
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the JSON data
    $data = json_decode(file_get_contents('php://input'), true);
    error_log(json_encode($data)); // Log incoming JSON data

if (isset($_POST['countryId'], $_POST['fieldId'], $_POST['siteId'], $_POST['wellId'], $_POST['wellboreId'], $_POST['reportName'])) {
    $countryId = $_POST['countryId'];
    $fieldId = $_POST['fieldId'];
    $siteId = $_POST['siteId'];
    $wellId = $_POST['wellId'];
    $wellboreId = $_POST['wellboreId'];
    $reportName = trim($_POST['reportName']);

        if ($countryId === "addNewCountry" && isset($_POST['newCountryId'])) {
            $countryId = $_POST['newCountryId'];
        }

        if (!empty($reportName)) {
            // Handle adding new entries if needed
            if ($fieldId === "addNewField" && isset($_POST['newFieldName'])) {
                $newFieldName = trim($_POST['newFieldName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_field (field_name, country_id) VALUES (:fieldName, :countryId)");
                $stmt->bindParam(':fieldName', $newFieldName);
                $stmt->bindParam(':countryId', $countryId);
                if (!$stmt->execute()) {
                    error_log("Error inserting new field: " . json_encode($stmt->errorInfo()));
                }
                $fieldId = $pdo->lastInsertId();
            }

            if ($siteId === "addNewSite" && isset($_POST['newSiteName'])) {
                $newSiteName = trim($_POST['newSiteName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_site (site_name, field_id, country_id) VALUES (:siteName, :fieldId, :countryId)");
                $stmt->bindParam(':siteName', $newSiteName);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':countryId', $countryId);
                if (!$stmt->execute()) {
                    error_log("Error inserting new site: " . json_encode($stmt->errorInfo()));
                }
                $siteId = $pdo->lastInsertId();
            }

            // Continue for well, wellbore, and report insertion...
 if ($wellId === "addNewWell" && isset($_POST['newWellName'])) {
        $newWellName = trim($_POST['newWellName']);
        $stmt = $pdo->prepare("INSERT INTO tbl_well (well_name, site_id, field_id, country_id) VALUES (:wellName, :siteId, :fieldId, :countryId)");
        $stmt->bindParam(':wellName', $newWellName);
        $stmt->bindParam(':siteId', $siteId);
        $stmt->bindParam(':fieldId', $fieldId);
        $stmt->bindParam(':countryId', $countryId);
        if (!$stmt->execute()) {
            error_log("Error inserting new well: " . json_encode($stmt->errorInfo()));
        }
        $wellId = $pdo->lastInsertId();
        error_log("New well added: $wellId - $newWellName");
    }

    // Handle adding new wellbore
    if ($wellboreId === "addNewWellbore" && isset($_POST['newWellboreName'])) {
        $newWellboreName = trim($_POST['newWellboreName']);
        $stmt = $pdo->prepare("INSERT INTO tbl_wellbore (wellbore_name, well_id, country_id, site_id, field_id) VALUES (:wellboreName, :wellId, :countryId, :siteId, :fieldId)");
        $stmt->bindParam(':wellboreName', $newWellboreName);
        $stmt->bindParam(':wellId', $wellId);
        $stmt->bindParam(':countryId', $countryId);
        $stmt->bindParam(':siteId', $siteId);
        $stmt->bindParam(':fieldId', $fieldId);
        if (!$stmt->execute()) {
            error_log("Error inserting new wellbore: " . json_encode($stmt->errorInfo()));
        }
        $wellboreId = $pdo->lastInsertId();
        error_log("New wellbore added: $wellboreId - $newWellboreName");
    }

    // Insert the report
    $stmt = $pdo->prepare("INSERT INTO tbl_report (country_id, field_id, site_id, well_id, wellbore_id, report_name, created_at, updated_at) 
                        VALUES (:countryId, :fieldId, :siteId, :wellId, :wellboreId, :reportName, NOW(), NOW())");
    $stmt->bindParam(':countryId', $countryId);
    $stmt->bindParam(':fieldId', $fieldId);
    $stmt->bindParam(':siteId', $siteId);
    $stmt->bindParam(':wellId', $wellId);
    $stmt->bindParam(':wellboreId', $wellboreId);
    $stmt->bindParam(':reportName', $reportName);
    if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = "Report added successfully!";
    error_log("New report added: " . $pdo->lastInsertId() . " - $reportName");
    } else {
    error_log("Error inserting report: " . json_encode($stmt->errorInfo()));
    $response['status'] = 'error';
    $response['message'] = "Error: Could not add report.";
    }

} else {
    $response['status'] = 'error';
    $response['message'] = "Error: Report name cannot be empty.";
}
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error: Invalid request. Please check your form fields.";
    }
} catch (PDOException $exception) {
    $response['status'] = 'error';
    $response['message'] = "Error: " . htmlspecialchars($exception->getMessage());
}

echo json_encode($response);
?>
