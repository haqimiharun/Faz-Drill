<?php
// Database connection parameters
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a PDO connection for PostgreSQL
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

    // Check if the reportId is set
    if (isset($_GET['reportId'])) {
        $reportId = $_GET['reportId'];

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare("SELECT * FROM tbl_wellinfo WHERE report_id = :reportId");
        $stmt->bindParam(':reportId', $reportId, PDO::PARAM_INT); // Assuming report_id is an integer
        $stmt->execute();

        // Check if a record was found
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the data as an associative array

            // Return the data as a JSON response
            echo json_encode($data);
        } else {
            // Return an error message if no data is found
            echo json_encode(["error" => "No data found for the given report ID."]);
        }
    } else {
        // Return an error message if reportId is not provided
        echo json_encode(["error" => "Report ID is missing."]);
    }
} catch (PDOException $e) {
    // Return an error message in case of a database connection error
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
}

// Close the connection (optional with PDO, as it closes automatically)
$pdo = null;
?>
