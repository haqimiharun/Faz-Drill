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

        // If well data is found, fetch corresponding event description and rig name
        if ($wellData) {
            // Fetch event description from the event database
            $eventId = $wellData['event_id'];
            $stmt_event = $pdo_event->prepare("SELECT event_code FROM tbl_event WHERE event_id = :eventId");
            $stmt_event->execute(['eventId' => $eventId]);
            $eventData = $stmt_event->fetch(PDO::FETCH_ASSOC);
            $wellData['event_code'] = $eventData ? $eventData['event_code'] : 'Event not found';

            // Fetch rig name from the rig database
            $rigId = $wellData['rig_id'];
            $stmt_rig = $pdo_rig->prepare("SELECT rig_name2 FROM tbl_rigs WHERE rig_id = :rigId");
            $stmt_rig->execute(['rigId' => $rigId]);
            $rigData = $stmt_rig->fetch(PDO::FETCH_ASSOC);
            $wellData['rig_name2'] = $rigData ? $rigData['rig_name2'] : 'Rig not found';

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
