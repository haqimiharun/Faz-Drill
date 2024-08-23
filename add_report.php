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

    // Query to fetch country data
    $stmt = $pdo->prepare("SELECT country_id, country_name FROM tbl_country");
    $stmt->execute();

    // Fetch all the countries
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>
                <form action="submit-design.php" method="POST">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="">Select a country</option>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="field">Field</label>
                        <select id="field" name="field" disabled>
                            <option value="">Select country first</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="site">Site</label>
                        <select id="site" name="site" disabled>
                            <option value="">Select field first</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="well">Well</label>
                        <select id="well" name="well" disabled>
                            <option value="">Select site first</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="wellbore">Wellbore</label>
                        <select id="wellbore" name="wellbore" disabled>
                            <option value="">Select well first</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="report-name">Report Name</label>
                        <input type="text" id="report-name" name="report" placeholder="Enter new report name">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>

