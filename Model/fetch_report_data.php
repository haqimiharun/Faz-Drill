<?php
header('Content-Type: application/json');

// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'root';
$dbpass = '';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialize array to hold data
    $data = [];

    // Fetch countries and their related fields
    $sql = "SELECT c.country_id, c.country_name 
            FROM tbl_country c
            JOIN tbl_field f ON c.country_id = f.country_id
            GROUP BY c.country_id";
    $stmt = $pdo->query($sql);
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($countries as &$country) {
        $country_id = $country['country_id'];
        $country['fields'] = [];

        // Fetch fields related to the current country
        $sql = "SELECT f.field_id, f.field_name 
                FROM tbl_field f
                WHERE f.country_id = :country_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['country_id' => $country_id]);
        $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($fields as &$field) {
            $field_id = $field['field_id'];
            $field['sites'] = [];

            // Fetch sites related to the current field
            $sql = "SELECT s.site_id, s.site_name 
                    FROM tbl_site s
                    WHERE s.field_id = :field_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['field_id' => $field_id]);
            $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($sites as &$site) {
                $site_id = $site['site_id'];
                $site['wells'] = [];

                // Fetch wells related to the current site
                $sql = "SELECT w.well_id, w.well_name 
                        FROM tbl_well w
                        WHERE w.site_id = :site_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['site_id' => $site_id]);
                $wells = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($wells as &$well) {
                    $well_id = $well['well_id'];
                    $well['wellbores'] = [];

                    // Fetch wellbores related to the current well
                    $sql = "SELECT wb.wellbore_id, wb.wellbore_name 
                            FROM tbl_wellbore wb
                            WHERE wb.well_id = :well_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['well_id' => $well_id]);
                    $wellbores = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($wellbores as &$wellbore) {
                        $wellbore_id = $wellbore['wellbore_id'];
                        $wellbore['reports'] = [];

                        // Fetch reports related to the current wellbore
                        $sql = "SELECT r.report_id, r.report_name 
                                FROM tbl_report r
                                WHERE r.wellbore_id = :wellbore_id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['wellbore_id' => $wellbore_id]);
                        $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $wellbore['reports'] = $reports;
                    }

                    $well['wellbores'] = $wellbores;
                }

                $site['wells'] = $wells;
            }

            $field['sites'] = $sites;
        }

        $country['fields'] = $fields;
    }

    $data['countries'] = $countries;

    echo json_encode($data);

} catch (PDOException $exception) {
    // Handle errors
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error: " . htmlspecialchars($exception->getMessage())]);
}
// Initialize data array
$data = [];

?>
