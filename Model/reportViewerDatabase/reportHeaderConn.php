<?php
// Database configuration
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a new PDO instance
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the report_id from the request (assuming it's passed via GET or POST)
    $report_id = isset($_GET['report_id']) ? (int)$_GET['report_id'] : 1; // Default to 1 for testing

    // Prepare SQL query to fetch data from tbl_report
    $sql = "
    SELECT 
        tr.report_name AS reportNo, 
        tw.well_name AS well, 
        twb.wellbore_name AS wellbore, 
        tr.\"createdAt\" AS reportDate
    FROM tbl_report tr
    JOIN tbl_well tw ON tr.well_id = tw.well_id
    JOIN tbl_wellbore twb ON tr.wellbore_id = twb.wellbore_id
    WHERE tr.report_id = :report_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':report_id', $report_id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the result
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);

} catch (PDOException $e) {
    // Handle any errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>
