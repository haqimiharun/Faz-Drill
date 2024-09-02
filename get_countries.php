<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if countryId is provided
    if (isset($_GET['id'])) {
        $countryId = intval($_GET['id']);

        // Prepare the select statement
        $stmt = $pdo->prepare("SELECT country_name FROM tbl_country WHERE country_id = :countryId");
        $stmt->bindParam(':countryId', $countryId);
        $stmt->execute();

        // Fetch the country name
        $country = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($country) {
            // Return the country name as JSON
            header('Content-Type: application/json');
            echo json_encode(['name' => $country['country_name']]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['name' => null]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['name' => null]);
    }
} catch (PDOException $exception) {
    header('Content-Type: application/json');
    echo json_encode(['error' => htmlspecialchars($exception->getMessage())]);
}
?>
