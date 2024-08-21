<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    http_response_code(500);
    echo "Connection error: " . htmlspecialchars($exception->getMessage());
    exit;
}

if (isset($_POST['countryName'])) {
    $countryName = trim($_POST['countryName']);

    if (!empty($countryName)) {
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_country WHERE country_name = :countryName");
            $stmt->bindParam(':countryName', $countryName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                http_response_code(400);
                echo "Country already exists.";
            } else {
                $stmt = $pdo->prepare("INSERT INTO tbl_country (country_name) VALUES (:countryName)");
                $stmt->bindParam(':countryName', $countryName);
                $stmt->execute();

                echo "Country added successfully!";
            }
        } catch (PDOException $exception) {
            http_response_code(500);
            echo "Database Error: " . htmlspecialchars($exception->getMessage());
        }
    } else {
        http_response_code(400);
        echo "Error: Please enter a valid country name.";
    }
} else {
    http_response_code(400);
    echo "Error: Invalid request.";
}
?>
