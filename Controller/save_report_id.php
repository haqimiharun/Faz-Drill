<?php
session_start(); // Start the session

// Get the reportId from the query string
$reportId = $_GET['reportId'] ?? null;

if ($reportId) {
    $_SESSION['reportId'] = $reportId;
}

// Optionally, you can return a response to indicate success
echo 'Report ID saved';
?>
