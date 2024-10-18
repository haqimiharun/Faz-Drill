<?php
header('Content-Type: application/json'); // Set content type to JSON

// Database configuration
$dbhost = 'localhost';
$dbname = 'faazmiar_library';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a PDO connection for PostgreSQL
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

    // Prepare and execute query to get event details
    $stmt = $pdo->prepare("SELECT event_id, event_code, event_desc FROM tbl_event");
    $stmt->execute();
    
    // Fetch all events as an associative array
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the data as JSON
    echo json_encode($events);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error message in JSON format
}
