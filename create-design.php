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


     <style>
        /* Include the CSS code here */
        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1030;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin: auto;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
        }

        .radio-group div {
            display: flex;
            align-items: center;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1px;
            margin-top: 5px;
        }

        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal-footer .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .modal-footer .btn-primary:hover,
        .modal-footer .btn-secondary:hover {
            opacity: 0.8;
        }
    </style>