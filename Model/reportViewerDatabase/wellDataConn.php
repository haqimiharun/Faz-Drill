<?php
header('Content-Type: application/json');
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get company and country
$companyId = $_GET['company_id']; // Example input from your front-end
$countryId = $_GET['country_id'];
$fieldId = $_GET['field_id']; // Pass in field_id to get related data

// Fetch company
$companyQuery = $conn->prepare("SELECT company_name FROM tbl_user WHERE company_id = ?");
$companyQuery->bind_param("i", $companyId);
$companyQuery->execute();
$companyQuery->bind_result($companyName);
$companyQuery->fetch();
$companyQuery->close();

// Fetch country
$countryQuery = $conn->prepare("SELECT country_name FROM tbl_report WHERE country_id = ?");
$countryQuery->bind_param("i", $countryId);
$countryQuery->execute();
$countryQuery->bind_result($countryName);
$countryQuery->fetch();
$countryQuery->close();

// Fetch field, region, and block based on field_id
$fieldQuery = $conn->prepare("SELECT field_name, region_name, block_name FROM tbl_report WHERE field_id = ?");
$fieldQuery->bind_param("i", $fieldId);
$fieldQuery->execute();
$fieldQuery->bind_result($fieldName, $regionName, $blockName);
$fieldQuery->fetch();
$fieldQuery->close();

// Prepare response
$response = [
    "company" => $companyName,
    "country" => $countryName,
    "field" => $fieldName,
    "region" => $regionName,
    "block" => $blockName
];

echo json_encode($response);
$conn->close();
?>
