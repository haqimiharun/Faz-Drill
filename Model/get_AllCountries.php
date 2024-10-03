<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

try {
    // Establish the database connection
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch countries
    $stmt = $pdo->query("SELECT country_id, country_name FROM tbl_country");
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($countries);
} catch (PDOException $exception) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
