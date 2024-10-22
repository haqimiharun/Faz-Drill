<?php
// Database configuration for fazdrill
$dbhost_fazdrill = 'localhost';
$dbname_fazdrill = 'fazdrill';
$dbuser_fazdrill = 'postgres';
$dbpass_fazdrill = 'ftsb@123';

// Database configuration for the other databases
$dbhost_other = 'localhost';
$dbname_event = 'faazmiar_library'; // Replace with your actual event database name
$dbname_rig = 'faazmiar_library'; // Replace with your actual rig database name
$dbuser_other = 'postgres';
$dbpass_other = 'ftsb@123';

try {
    // Create a PDO connection for fazdrill database
    $pdo_fazdrill = new PDO("pgsql:host=$dbhost_fazdrill;dbname=$dbname_fazdrill", $dbuser_fazdrill, $dbpass_fazdrill);
    $pdo_fazdrill->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create a PDO connection for event and rig databases
    $pdo_event = new PDO("pgsql:host=$dbhost_other;dbname=$dbname_event", $dbuser_other, $dbpass_other);
    $pdo_event->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo_rig = new PDO("pgsql:host=$dbhost_other;dbname=$dbname_rig", $dbuser_other, $dbpass_other);
    $pdo_rig->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the report ID is set in the GET request
    if (isset($_GET['report_id'])) {
        $reportId = $_GET['report_id'];

        // Prepare and execute the query to fetch well data from fazdrill database
        $stmt = $pdo_fazdrill->prepare("SELECT * FROM tbl_wellinfo WHERE report_id = :reportId");
        $stmt->execute(['reportId' => $reportId]);
        $wellData = $stmt->fetch(PDO::FETCH_ASSOC);

        // If well data is found, fetch corresponding event description, rig name, region name, and block name
        if ($wellData) {
            // Fetch event code and event description from the event database
            $eventId = $wellData['event_id'];
            $stmt_event = $pdo_event->prepare("SELECT event_code, event_desc FROM tbl_event WHERE event_id = :eventId");
            $stmt_event->execute(['eventId' => $eventId]);
            $eventData = $stmt_event->fetch(PDO::FETCH_ASSOC);
            $wellData['event_code'] = $eventData ? $eventData['event_code'] : 'Event not found';
            $wellData['event_desc'] = $eventData ? $eventData['event_desc'] : 'Event description not found';

            // Fetch rig name from the rig database
            $rigId = $wellData['rig_id'];
            $stmt_rig = $pdo_rig->prepare("SELECT rig_name2 FROM tbl_rigs WHERE rig_id = :rigId");
            $stmt_rig->execute(['rigId' => $rigId]);
            $rigData = $stmt_rig->fetch(PDO::FETCH_ASSOC);
            $wellData['rig_name2'] = $rigData ? $rigData['rig_name2'] : 'Rig not found';

            // Fetch region name from the region table in fazdrill database
            $regionId = $wellData['region_id'];
            $stmt_region = $pdo_fazdrill->prepare("SELECT region_name FROM tbl_region WHERE region_id = :regionId");
            $stmt_region->execute(['regionId' => $regionId]);
            $regionData = $stmt_region->fetch(PDO::FETCH_ASSOC);
            $wellData['region_name'] = $regionData ? $regionData['region_name'] : 'Region not found';

            // Fetch block name from the block table in fazdrill database
            $blockId = $wellData['block_id'];
            $stmt_block = $pdo_fazdrill->prepare("SELECT block_name FROM tbl_block WHERE block_id = :blockId");
            $stmt_block->execute(['blockId' => $blockId]);
            $blockData = $stmt_block->fetch(PDO::FETCH_ASSOC);
            $wellData['block_name'] = $blockData ? $blockData['block_name'] : 'Block not found';

            // Return the result as JSON
            echo json_encode($wellData);
        } else {
            echo json_encode(['error' => 'No data found for this report ID.']);
        }
    } else {
        echo json_encode(['error' => 'No report ID provided.']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
