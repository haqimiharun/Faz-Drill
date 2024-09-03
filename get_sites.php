<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Establish a new database connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if 'id' parameter is set in the GET request
    if (isset($_GET['id'])) {
        $siteId = intval($_GET['id']); // Convert the ID to an integer for security

        // Prepare SQL statement to fetch site name based on the site ID
        $stmt = $pdo->prepare("SELECT site_name FROM tbl_site WHERE site_id = :siteId LIMIT 1");
        $stmt->bindParam(':siteId', $siteId, PDO::PARAM_INT);
        $stmt->execute();
        $site = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the site was found and return the result
        if ($site) {
            echo json_encode(["status" => "success", "site_name" => $site['site_name']]);
        } else {
            echo json_encode(["status" => "error", "message" => "Site not found for ID: {$siteId}"]);
        }
    } else {
        // Error if 'id' parameter is missing in the GET request
        echo json_encode(["status" => "error", "message" => "Missing site ID parameter."]);
    }
} catch (PDOException $exception) {
    // Catch any PDO exceptions and return an error response
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . htmlspecialchars($exception->getMessage())]);
}
?>
