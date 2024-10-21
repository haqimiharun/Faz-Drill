<?php
// Database configuration
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

$pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['event_id'])) {
    $eventId = $_GET['event_id'];
    $stmt = $pdo->prepare("SELECT event_code FROM tbl_event WHERE event_id = :eventId");
    $stmt->execute(['eventId' => $eventId]);
    $eventData = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($eventData);
} else {
    echo json_encode(['error' => 'No event ID provided.']);
}
?>
