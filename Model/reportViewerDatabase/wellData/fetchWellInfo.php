<?php
header('Content-Type: application/json'); // Set content type to JSON
session_start();
// Database configuration
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a PDO connection for PostgreSQL
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

    // Get reportId from the URL
    $reportId = $_GET['reportId'] ?? null; 

    if ($reportId === null) {
        echo json_encode(['error' => 'No report ID provided']);
        exit; // Terminate the script execution if no report ID is provided
    }

    $companyId = $_SESSION['user']['company_id'];

    if ($companyId === null) {
        echo json_encode(['error' => 'No Company ID found in session']);
        exit; // Terminate if no user ID is found
    }

    // Fetch company name based on user_id
    $stmtCompany = $pdo->prepare("SELECT company_name FROM tbl_company WHERE company_id = :companyId");
    $stmtCompany->execute(['companyId' => $companyId]);
    $companyName = $stmtCompany->fetchColumn();

    if ($companyName === false) {
        echo json_encode(['error' => 'No company found for the user']);
        exit; // Terminate if no company found
    }

    // Prepare and execute the query to fetch report details
    $stmtReport = $pdo->prepare("
    SELECT r.country_id, b.region_id, s.block_id, f.field_name
    FROM tbl_report r
    JOIN tbl_site s ON r.site_id = s.site_id
    JOIN tbl_block b ON s.block_id = b.block_id
    JOIN tbl_field f ON r.field_id = f.field_id
    WHERE r.report_id = :reportId
    ");
    $stmtReport->execute(['reportId' => $reportId]);
    $reportData = $stmtReport->fetch(PDO::FETCH_ASSOC);

    if ($reportData) {
        // Fetch country name based on country_id
        $countryId = $reportData['country_id'];
        $stmtCountry = $pdo->prepare("SELECT country_name FROM tbl_country WHERE country_id = :countryId");
        $stmtCountry->execute(['countryId' => $countryId]);
        $countryName = $stmtCountry->fetchColumn();

        // Fetch region name based on region_id
        $regionId = $reportData['region_id'];
        $stmtRegion = $pdo->prepare("SELECT region_name FROM tbl_region WHERE region_id = :regionId");
        $stmtRegion->execute(['regionId' => $regionId]);
        $regionName = $stmtRegion->fetchColumn();

        // Fetch block name based on block_id
        $blockId = $reportData['block_id'];
        $stmtBlock = $pdo->prepare("SELECT block_name FROM tbl_block WHERE block_id = :blockId");
        $stmtBlock->execute(['blockId' => $blockId]);
        $blockName = $stmtBlock->fetchColumn();

        // Fetch well information based on reportId
        $stmtWell = $pdo->prepare("SELECT * FROM tbl_wellinfo WHERE report_id = :reportId");
        $stmtWell->execute(['reportId' => $reportId]);
        $wellData = $stmtWell->fetch(PDO::FETCH_ASSOC);

        if ($wellData) {
            // Prepare response data
            $response = [
                'companyName' => $companyName,
                'countryName' => $countryName ?: 'N/A',
                'regionName' => $regionName ?: 'N/A',
                'blockName' => $blockName ?: 'N/A',
                'fieldName' => $reportData['field_name'] ?: 'N/A',
                // Add well information to the response
                'wellPlatform' => $wellData['well_platform'] ?? 'N/A',
                'wellObj' => $wellData['well_obj'] ?? 'N/A',
                'startDate' => $wellData['well_startdate'] ?? 'N/A',
                'spudDate' => $wellData['well_spuddate'] ?? 'N/A',
                'endDate' => $wellData['well_enddate'] ?? 'N/A',
                'waterDepth' => $wellData['well_waterdepth'] ?? 'N/A',
                'nightDs' => $wellData['well_nightds'] ?? 'N/A',
                'afeNo' => $wellData['well_afeno'] ?? 'N/A',
                'leadDs' => $wellData['well_leadds'] ?? 'N/A',
                'engineer' => $wellData['well_engineer'] ?? 'N/A',
                'rigId' => $wellData['rig_id'] ?? 'N/A',
                'eventId' => $wellData['event_id'] ?? 'N/A',
            ];
            echo json_encode($response); // Return the data as JSON
        } else {
            echo json_encode(['error' => 'No well data found for the provided report ID.']);
        }
    } else {
        echo json_encode(['error' => 'No data found for the provided report ID.']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error message in JSON format
}
?>