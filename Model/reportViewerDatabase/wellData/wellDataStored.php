<?php
// Start session
session_start();

// Database configuration for the existing database
$dbhost1 = 'localhost';
$dbname1 = 'fazdrill';
$dbuser1 = 'postgres';
$dbpass1 = 'ftsb@123';

// Create a PDO connection for the existing database
$pdo1 = new PDO("pgsql:host=$dbhost1;dbname=$dbname1", $dbuser1, $dbpass1);
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

// Database configuration for the new library database
$dbhost2 = 'localhost';
$dbname2 = 'faazmiar_library';
$dbuser2 = 'postgres';
$dbpass2 = 'ftsb@123';

// Create a PDO connection for the new database
$pdo2 = new PDO("pgsql:host=$dbhost2;dbname=$dbname2", $dbuser2, $dbpass2);
$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

$companyId = $_SESSION['user']['company_id'];

if ($companyId === null) {
    echo json_encode(['error' => 'No Company ID found in session']);
    exit; // Terminate if no user ID is found
}

// Function to handle undefined values and set them to NULL
function handleUndefined($value) {
    return isset($value) && $value !== '' ? $value : NULL;
}

// Retrieve reportId from POST data
$reportId = handleUndefined($_POST['reportId']);

// Prepare and execute the query to fetch report details from the existing database
$stmtReport = $pdo1->prepare("SELECT r.country_id, b.region_id, s.block_id, f.field_id
    FROM tbl_report r
    JOIN tbl_site s ON r.site_id = s.site_id
    JOIN tbl_block b ON s.block_id = b.block_id
    JOIN tbl_field f ON r.field_id = f.field_id
    WHERE r.report_id = :reportId");
$stmtReport->execute(['reportId' => $reportId]);
$reportData = $stmtReport->fetch(PDO::FETCH_ASSOC);

// Check if the report data was retrieved successfully
if ($reportData) {
    // Retrieve the IDs from the report data
    $regionId = $reportData['region_id'];
    $blockId = $reportData['block_id'];
    $fieldId = $reportData['field_id'];

    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and retrieve POST data
        $eventCode = handleUndefined($_POST['eventDesc']);
        $rigName = handleUndefined($_POST['rigName']);
        
        // Fetch event_id based on event_code from the new database
        $stmtEvent = $pdo2->prepare("SELECT event_id FROM tbl_event WHERE event_code = :eventCode");
        $stmtEvent->execute(['eventCode' => $eventCode]);
        $eventId = $stmtEvent->fetchColumn();

        // Fetch rig_id based on rig_name2 from the new database
        $stmtRig = $pdo2->prepare("SELECT rig_id FROM tbl_rigs WHERE rig_name2 = :rigName");
        $stmtRig->execute(['rigName' => $rigName]);
        $rigId = $stmtRig->fetchColumn();

        // Check if event ID and rig ID are found
        if ($eventId === false) {
            echo json_encode(['error' => 'No event found for the provided event code.']);
            exit;
        }

        if ($rigId === false) {
            echo json_encode(['error' => 'No rig found for the provided rig name.']);
            exit;
        }

        $wellPlatform = handleUndefined($_POST['platform']);
        $wellWaterDepth = handleUndefined($_POST['waterDepth']);
        $wellObj = handleUndefined($_POST['objective']);
        $wellAfeNo = handleUndefined($_POST['afeNo']);
        $wellStartDate = handleUndefined($_POST['startDate']);
        $wellSpudDate = handleUndefined($_POST['spudDate']);
        $wellEndDate = handleUndefined($_POST['endDate']);
        $wellLeadDS = handleUndefined($_POST['leadDS']);
        $wellNightDS = handleUndefined($_POST['nightDS']);
        $wellEngineer = handleUndefined($_POST['pcsbEng']);

        // Check if the reportId already exists in tbl_wellinfo
        $stmtCheck = $pdo1->prepare("SELECT COUNT(*) FROM tbl_wellinfo WHERE report_id = :reportId");
        $stmtCheck->execute(['reportId' => $reportId]);
        $exists = $stmtCheck->fetchColumn() > 0;

        if ($exists) {
            // Prepare the SQL update statement
            $sql = "UPDATE tbl_wellinfo SET 
                event_id = :eventId,
                region_id = :regionId,
                block_id = :blockId,
                field_id = :fieldId,
                well_platform = :wellPlatform,
                rig_id = :rigId,
                well_waterdepth = :wellWaterDepth,
                well_obj = :wellObj,
                well_afeno = :wellAfeNo,
                well_startdate = :wellStartDate,
                well_spuddate = :wellSpudDate,
                well_enddate = :wellEndDate,
                well_leadds = :wellLeadDS,
                well_nightds = :wellNightDS,
                well_engineer = :wellEngineer
                WHERE report_id = :reportId";
        } else {
            // Prepare the SQL insert statement
            $sql = "INSERT INTO tbl_wellinfo (
                report_id, company_id, event_id, region_id, block_id, field_id, 
                well_platform, rig_id, well_waterdepth, well_obj, well_afeno, 
                well_startdate, well_spuddate, well_enddate, well_leadds, well_nightds, 
                well_engineer
            ) VALUES (
                :reportId, :companyId, :eventId, :regionId, :blockId, :fieldId, 
                :wellPlatform, :rigId, :wellWaterDepth, :wellObj, :wellAfeNo, 
                :wellStartDate, :wellSpudDate, :wellEndDate, :wellLeadDS, :wellNightDS, 
                :wellEngineer
            )";
        }

        // Prepare the statement
        $stmt = $pdo1->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':reportId', $reportId);
        $stmt->bindParam(':companyId', $companyId);
        $stmt->bindParam(':eventId', $eventId);
        $stmt->bindParam(':regionId', $regionId);
        $stmt->bindParam(':blockId', $blockId);
        $stmt->bindParam(':fieldId', $fieldId);
        $stmt->bindParam(':wellPlatform', $wellPlatform);
        $stmt->bindParam(':rigId', $rigId);
        $stmt->bindParam(':wellWaterDepth', $wellWaterDepth);
        $stmt->bindParam(':wellObj', $wellObj);
        $stmt->bindParam(':wellAfeNo', $wellAfeNo);
        $stmt->bindParam(':wellStartDate', $wellStartDate);
        $stmt->bindParam(':wellSpudDate', $wellSpudDate);
        $stmt->bindParam(':wellEndDate', $wellEndDate);
        $stmt->bindParam(':wellLeadDS', $wellLeadDS);
        $stmt->bindParam(':wellNightDS', $wellNightDS);
        $stmt->bindParam(':wellEngineer', $wellEngineer);

        // Execute the statement
        try {
            $stmt->execute();
            echo json_encode(['success' => $exists ? 'Data updated successfully.' : 'Data inserted successfully.']);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Data insertion/update failed: ' . $e->getMessage()]);
        }
    } else {
        echo 'Invalid request method. Please submit the form.';
    }
} else {
    echo json_encode(['error' => 'No report data found for the provided Report ID.']);
}
?>
