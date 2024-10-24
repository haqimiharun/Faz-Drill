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

// Get country ID from the request
$countryId = isset($_GET['country_id']) ? intval($_GET['country_id']) : null;

if ($countryId) {
    try {
        // Prepare the SQL statement to fetch regions for the specified country
        $stmt = $pdo->prepare("SELECT lib_region_id, lib_region_name, lib_region_code FROM tbl_lib_region WHERE lib_region_country_id = :countryId");
        $stmt->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch all results
        $regions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the regions in JSON format
        echo json_encode(['regions' => $regions]);

    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Country ID is required']);
}
?>
