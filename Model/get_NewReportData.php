<?php
// Database configuration
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Create a new PDO instance
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL queries
    $queries = [
        'countries' => 'SELECT country_id, country_name FROM tbl_country ORDER BY country_name ASC',
        'fields' => 'SELECT field_id, field_name FROM tbl_field ORDER BY field_name ASC',
        'sites' => 'SELECT site_id, site_name FROM tbl_site ORDER BY site_name ASC',
        'wells' => 'SELECT well_id, well_name FROM tbl_well ORDER BY well_name ASC',
        'wellbores' => 'SELECT wellbore_id, wellbore_name FROM tbl_wellbore ORDER BY wellbore_name ASC'
    ];

    // Fetch data for each query
    $data = [];
    foreach ($queries as $key => $sql) {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data[$key] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);

} catch (PDOException $e) {
    // Handle any errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>
