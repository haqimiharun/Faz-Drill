<?php
header('Content-Type: application/json');

// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

$response = array();

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['countryId'], $data['fieldId'], $data['siteId'], $data['wellId'], $data['wellboreId'], $data['reportName'])) {
        $countryId = $data['countryId'];
        $fieldId = $data['fieldId'];
        $siteId = $data['siteId'];
        $wellId = $data['wellId'];
        $wellboreId = $data['wellboreId'];
        $reportName = trim($data['reportName']);

        if ($countryId === "addNewCountry" && isset($data['newCountryId'])) {
            $countryId = $data['newCountryId'];
        }

        if (!empty($reportName)) {
            // Handle adding new entries if needed
            if ($fieldId === "addNewField" && isset($data['newFieldName'])) {
                $newFieldName = trim($data['newFieldName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_field (field_name, country_id) VALUES (:fieldName, :countryId)");
                $stmt->bindParam(':fieldName', $newFieldName);
                $stmt->bindParam(':countryId', $countryId);
                $stmt->execute();
                $fieldId = $pdo->lastInsertId();
                error_log("New field added: $fieldId - $newFieldName");
            }

            if ($siteId === "addNewSite" && isset($data['newSiteName'])) {
                $newSiteName = trim($data['newSiteName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_site (site_name, field_id, country_id) VALUES (:siteName, :fieldId, :countryId)");
                $stmt->bindParam(':siteName', $newSiteName);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':countryId', $countryId);
                $stmt->execute();
                $siteId = $pdo->lastInsertId();
                error_log("New site added: $siteId - $newSiteName");
            }

            if ($wellId === "addNewWell" && isset($data['newWellName'])) {
                $newWellName = trim($data['newWellName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_well (well_name, site_id, field_id, country_id) VALUES (:wellName, :siteId, :fieldId, :countryId)");
                $stmt->bindParam(':wellName', $newWellName);
                $stmt->bindParam(':siteId', $siteId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->bindParam(':countryId', $countryId);
                $stmt->execute();
                $wellId = $pdo->lastInsertId();
                error_log("New well added: $wellId - $newWellName");
            }

            if ($wellboreId === "addNewWellbore" && isset($data['newWellboreName'])) {
                $newWellboreName = trim($data['newWellboreName']);
                $stmt = $pdo->prepare("INSERT INTO tbl_wellbore (wellbore_name, well_id, country_id, site_id, field_id) VALUES (:wellboreName, :wellId, :countryId, :siteId, :fieldId)");
                $stmt->bindParam(':wellboreName', $newWellboreName);
                $stmt->bindParam(':wellId', $wellId);
                $stmt->bindParam(':countryId', $countryId);
                $stmt->bindParam(':siteId', $siteId);
                $stmt->bindParam(':fieldId', $fieldId);
                $stmt->execute();
                $wellboreId = $pdo->lastInsertId();
                error_log("New wellbore added: $wellboreId - $newWellboreName");
            }

            // Insert the report
            $stmt = $pdo->prepare("INSERT INTO tbl_report (country_id, field_id, site_id, well_id, wellbore_id, report_name) VALUES (:countryId, :fieldId, :siteId, :wellId, :wellboreId, :reportName)");
            $stmt->bindParam(':countryId', $countryId);
            $stmt->bindParam(':fieldId', $fieldId);
            $stmt->bindParam(':siteId', $siteId);
            $stmt->bindParam(':wellId', $wellId);
            $stmt->bindParam(':wellboreId', $wellboreId);
            $stmt->bindParam(':reportName', $reportName);
            $stmt->execute();

            $response['status'] = 'success';
            $response['message'] = "Report added successfully!";
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
