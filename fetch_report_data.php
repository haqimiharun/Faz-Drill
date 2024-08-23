<?php
header('Content-Type: application/json');

// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialize arrays for each entity
    $countries = [];
    $fields = [];
    $sites = [];
    $wells = [];
    $wellbores = [];

    // Fetch data for countries that have fields
    $sql = "SELECT DISTINCT c.country_id, c.country_name 
            FROM tbl_country c
            JOIN tbl_field f ON c.country_id = f.country_id";
    $stmt = $pdo->query($sql);
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for fields that have sites
    $sql = "SELECT DISTINCT f.field_id, f.field_name 
            FROM tbl_field f
            JOIN tbl_site s ON f.field_id = s.field_id";
    $stmt = $pdo->query($sql);
    $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for sites that have wells
    $sql = "SELECT DISTINCT s.site_id, s.site_name 
            FROM tbl_site s
            JOIN tbl_well w ON s.site_id = w.site_id";
    $stmt = $pdo->query($sql);
    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for wells that have wellbores
    $sql = "SELECT DISTINCT w.well_id, w.well_name 
            FROM tbl_well w
            JOIN tbl_wellbore wb ON w.well_id = wb.well_id";
    $stmt = $pdo->query($sql);
    $wells = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for wellbores that have reports
    $sql = "SELECT DISTINCT wb.wellbore_id, wb.wellbore_name 
            FROM tbl_wellbore wb
            JOIN tbl_report r ON wb.wellbore_id = r.wellbore_id";
    $stmt = $pdo->query($sql);
    $wellbores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Combine all data into a single array
    $data = [
        "countries" => $countries,
        "fields" => $fields,
        "sites" => $sites,
        "wells" => $wells,
        "wellbores" => $wellbores
    ];

    echo json_encode($data);

} catch (PDOException $exception) {
    // Handle errors
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
