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

    // Prepare the SQL statement to fetch unique country data from tbl_field
    $stmt = $pdo->prepare("
        SELECT DISTINCT c.*
        FROM tbl_country c
        JOIN tbl_field f ON c.country_id = f.country_id
    ");
    $stmt->execute();

    // Fetch all unique countries
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($countries) {
        // Return the country data as JSON
        header('Content-Type: application/json');
        echo json_encode($countries);
    } else {
        // Return a not found error if no country data is found
        header('Content-Type: application/json');
        echo json_encode(["error" => "No countries found"]);
    }
} catch (PDOException $exception) {
    // Handle any errors
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
