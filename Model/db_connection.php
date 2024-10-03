<!-- db_connection.php -->
<?php
$servername = "localhost";
$username = "postgre";
$password = "ftsb@123";
$dbname = "fazdrill";

// Create connection
$pdo = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
