<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check and insert new country if provided
    if (!empty($_POST['new_country'])) {
        $newCountry = $_POST['new_country'];
        $stmt = $pdo->prepare("INSERT INTO tbl_country (country_name) VALUES (:country_name)");
        $stmt->execute(['country_name' => $newCountry]);
        $countryId = $pdo->lastInsertId();
    } else {
        $countryId = $_POST['country'];
    }

    // Check and insert new field if provided
    if (!empty($_POST['new_field'])) {
        $newField = $_POST['new_field'];
        $stmt = $pdo->prepare("INSERT INTO tbl_field (field_name, country_id) VALUES (:field_name, :country_id)");
        $stmt->execute(['field_name' => $newField, 'country_id' => $countryId]);
        $fieldId = $pdo->lastInsertId();
    } else {
        $fieldId = $_POST['field'];
    }

    // Similarly handle new site, well, and wellbore if provided
    // ...

    // Insert or process design details here

    echo "Design submitted successfully!";
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>
