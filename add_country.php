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
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['countryName'])) {
    $countryName = $_POST['countryName'];

    if (!empty($countryName)) {
        try {
            // Check if the country already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_country WHERE country_name = :countryName");
            $stmt->bindParam(':countryName', $countryName);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "<p>Error: Country already exists.</p>";
            } else {
                // Prepare the insert statement
                $stmt = $pdo->prepare("INSERT INTO tbl_country (country_name) VALUES (:countryName)");
                $stmt->bindParam(':countryName', $countryName);
                $stmt->execute();

                // Output a success message
                echo "<p>Country added successfully!</p>";
            }
        } catch (PDOException $exception) {
            echo "<p>Error: " . $exception->getMessage() . "</p>";
        }
    } else {
        echo "<p>Please enter a country name.</p>";
    }
}
?>
<!-- HTML form for adding a new country -->
<form id="countryForm" action="" method="POST">
    <div class="form-group">
        <label for="countryName">Country Name</label>
        <input type="text" id="countryName" name="countryName" required>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Country</button>
    </div>
</form>
<div id="responseMessage">Error</div> <!-- For displaying success/error messages -->


     <style>
/* Form styling */
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

.form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.form-footer button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-footer .btn-primary {
    background-color: #007bff;
    color: white;
}

.form-footer .btn-primary:hover {
    opacity: 0.8;
}

    </style>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var countryForm = document.getElementById("countryForm");
    var responseMessage = document.getElementById("responseMessage");

    // Handle form submission via AJAX
    if (countryForm) {
        countryForm.onsubmit = function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(countryForm);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true); // Ensure the action URL is correct if needed
            xhr.onload = function() {
                // Update the response message div with server response
                responseMessage.innerHTML = xhr.responseText;
            };
            xhr.send(formData);
        };
    }
});
</script>


