<?php
$servername = "localhost";
$username = "postgres";
$password = "ftsb@123";
$dbname = "faazmiar_library";

// Create connection using PDO
try {
    $pdo = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => "Connection failed: " . $e->getMessage()]);
    exit;
}

// Check if lib_region_id is set in the query parameters
if (isset($_GET['lib_region_id'])) {
    $regionId = $_GET['lib_region_id'];

    try {
        // Prepare the SQL statement to fetch blocks based on region ID
        $stmt = $pdo->prepare("SELECT lib_block_id, lib_block_name FROM tbl_lib_block WHERE lib_region_id = :regionId");
        $stmt->bindParam(':regionId', $regionId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch all results
        $blocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the blocks in JSON format
        echo json_encode(['blocks' => $blocks]);

    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => "lib_region_id is required."]);
}
?>
