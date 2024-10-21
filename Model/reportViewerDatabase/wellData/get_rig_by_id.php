<?php
// Database configuration
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

$pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['rig_id'])) {
    $rigId = $_GET['rig_id'];
    $stmt = $pdo->prepare("SELECT rig_name2 FROM tbl_rigs WHERE rig_id = :rigId");
    $stmt->execute(['rigId' => $rigId]);
    $rigData = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($rigData);
} else {
    echo json_encode(['error' => 'No rig ID provided.']);
}
?>
