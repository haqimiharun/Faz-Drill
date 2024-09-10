<!-- db_connection.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fazdrill";

// Create connection
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
