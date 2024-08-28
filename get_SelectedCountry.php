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
    if (isset($_GET['countryId'])) {
        $countryId = $_GET['countryId'];

        // Prepare the SQL statement to fetch the specific country data
        $stmt = $pdo->prepare("SELECT * FROM tbl_country WHERE country_id = :countryId");
        $stmt->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the country data
        $country = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($country) {
            // Return the country data as JSON
            header('Content-Type: application/json');
            echo json_encode($country);
        } else {
            // Return a not found error if country data is not found
            header('Content-Type: application/json');
            echo json_encode(["error" => "Country not found"]);
        }
    } else {
        // Return an error if countryId is not provided
        header('Content-Type: application/json');
        echo json_encode(["error" => "No countryId provided"]);
    }
} catch (PDOException $exception) {
    // Handle any errors
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
?>
