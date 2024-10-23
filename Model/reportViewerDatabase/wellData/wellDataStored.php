<?php
// Start session
session_start();

// Database configuration for the existing database
$dbhost1 = 'localhost';
$dbname1 = 'fazdrill';
$dbuser1 = 'postgres';
$dbpass1 = 'ftsb@123';

// Create a PDO connection for the existing database
try {
    $pdo1 = new PDO("pgsql:host=$dbhost1;dbname=$dbname1", $dbuser1, $dbpass1);
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection to fazdrill failed: ' . $e->getMessage()]);
    exit;
}

// Database configuration for the new library database
$dbhost2 = 'localhost';
$dbname2 = 'faazmiar_library';
$dbuser2 = 'postgres';
$dbpass2 = 'ftsb@123';

// Create a PDO connection for the new database
try {
    $pdo2 = new PDO("pgsql:host=$dbhost2;dbname=$dbname2", $dbuser2, $dbpass2);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection to faazmiar_library failed: ' . $e->getMessage()]);
    exit;
}

// Check if the session has company ID
if (!isset($_SESSION['user']['company_id'])) {
    echo json_encode(['error' => 'No Company ID found in session']);
    exit;
}
$companyId = $_SESSION['user']['company_id'];

// Function to handle undefined values and set them to NULL
function handleUndefined($value) {
    return isset($value) && $value !== '' ? $value : NULL;
}

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(['error' => 'Invalid request method. Please use POST.']);
    exit;
}

// Retrieve data from POST
$reportId = handleUndefined($_POST['reportId']);
$eventCode = handleUndefined($_POST['eventDesc']);  // Ensure eventCode is passed
$rigName = handleUndefined($_POST['rigName']);      // Ensure rigName is passed

if (!$reportId || !$eventCode || !$rigName) {
    echo json_encode(['error' => 'Required fields are missing (reportId, eventDesc, or rigName).']);
    exit;
}

// Prepare and execute the query to fetch report details from the existing database
try {
    $stmtReport = $pdo1->prepare("SELECT r.country_id, b.region_id, s.block_id, f.field_id
        FROM tbl_report r
        JOIN tbl_site s ON r.site_id = s.site_id
        JOIN tbl_block b ON s.block_id = b.block_id
        JOIN tbl_field f ON r.field_id = f.field_id
        WHERE r.report_id = :reportId");
    $stmtReport->execute(['reportId' => $reportId]);
    $reportData = $stmtReport->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error fetching report data: ' . $e->getMessage()]);
    exit;
}

// Check if the report data was retrieved successfully
if (!$reportData) {
    echo json_encode(['error' => 'No report data found for the provided Report ID.']);
    exit;
}

// Retrieve the IDs from the report data
$regionId = $reportData['region_id'];
$blockId = $reportData['block_id'];
$fieldId = $reportData['field_id'];



// Retrieve well information from POST
$wellPlatform = handleUndefined($_POST['platform']);
$wellWaterDepth = handleUndefined($_POST['waterDepth']);

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
try {
    $stmtCheck = $pdo1->prepare("SELECT COUNT(*) FROM tbl_wellinfo WHERE report_id = :reportId");
    $stmtCheck->execute(['reportId' => $reportId]);
    $exists = $stmtCheck->fetchColumn() > 0;
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error checking report ID in wellinfo: ' . $e->getMessage()]);
    exit;
}

// Build SQL query based on whether the record exists
// Build SQL query based on whether the record exists
$sql = $exists
    ? "UPDATE tbl_wellinfo SET 
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
        well_engineer = :wellEngineer, 
        company_id = :companyId 
      WHERE report_id = :reportId"
    : "INSERT INTO tbl_wellinfo (report_id, company_id, event_id, region_id, block_id, field_id, well_platform, rig_id, well_waterdepth, well_obj, well_afeno, well_startdate, well_spuddate, well_enddate, well_leadds, well_nightds, well_engineer) 
      VALUES (:reportId, :companyId, :eventId, :regionId, :blockId, :fieldId, :wellPlatform, :rigId, :wellWaterDepth, :wellObj, :wellAfeNo, :wellStartDate, :wellSpudDate, :wellEndDate, :wellLeadDS, :wellNightDS, :wellEngineer)";

try {
    $stmt = $pdo1->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':reportId', $reportId);
    $stmt->bindParam(':companyId', $companyId);
    $stmt->bindParam(':eventId', $eventCode);
    $stmt->bindParam(':regionId', $regionId);
    $stmt->bindParam(':blockId', $blockId);
    $stmt->bindParam(':fieldId', $fieldId);
    $stmt->bindParam(':wellPlatform', $wellPlatform);
    $stmt->bindParam(':rigId', $rigName);
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
    $stmt->execute();
    echo json_encode(['success' => 'Well information saved successfully']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error saving well information: ' . $e->getMessage()]);
}
?>
