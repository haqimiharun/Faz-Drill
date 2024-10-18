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

    // Prepare and execute query to get rig details
    $stmt = $pdo->prepare("SELECT rig_id, rig_name2, rig_type FROM tbl_rigs");
    $stmt->execute();
    
    // Fetch all rigs as an associative array
    $rigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the data as JSON
    echo json_encode($rigs);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error message in JSON format
}
