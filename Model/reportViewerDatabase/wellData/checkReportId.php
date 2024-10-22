<?php
header('Content-Type: application/json'); // Set the content type to JSON

// Database connection details
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a PDO connection for PostgreSQL
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

    // Get reportId from the query parameters
    $reportId = $_GET['reportId'] ?? null;

    if (empty($reportId)) {
        // Return an error if reportId is not provided
        echo json_encode(['exists' => false, 'error' => 'No report ID provided.']);
        exit();
    }

    // Prepare the SQL query to check if the reportId exists
    $sql = "SELECT COUNT(*) as count FROM tbl_wellinfo WHERE report_id = :reportId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':reportId', $reportId, PDO::PARAM_STR); // Bind the parameter

    // Execute the query
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the reportId exists
    if ($result['count'] > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
} catch (PDOException $e) {
    // Handle any errors during the query
    echo json_encode(['exists' => false, 'error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
