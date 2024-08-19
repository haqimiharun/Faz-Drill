<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well Info Input</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f9fc;
    color: #333;
    padding: 20px;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
}

.wrapper {
    display: flex;
    flex-direction: column; /* Stack rows vertically */
    gap: 25px; /* Space between rows */
    width: 100%;
    max-width: 1800px;
}

.row {
    display: flex;
    gap: 25px; /* Space between containers in a row */
    flex-wrap: wrap; /* Ensure wrapping on smaller screens */
}

.container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    padding: 25px;
    flex: 1;
    min-width: 350px;
    box-sizing: border-box;
}

.container h2 {
    margin-bottom: 30px;
    color: #42C3FC;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group select {
    width: calc(100% - 20px);
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.personnel-group input[type="number"] {
    width: 100%;
    margin-bottom: 10px;
}

.form-group .checkbox-group,
.form-group .radio-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.checkbox-group label,
.radio-group label {
    flex: 1;
    min-width: 120px;
}

.form-group input[type="checkbox"],
.form-group input[type="radio"] {
    margin-right: 5px;
}

.btn-group {
    text-align: center;
    margin-top: 20px;
}

.btn-group button {
    padding: 10px 20px;
    background-color: #42C3FC;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn-group button:hover {
    background-color: #005E88;
}

@media (max-width: 768px) {
    body {
        padding: 10px;
    }
    .wrapper {
        flex-direction: column; /* Stack rows vertically on small screens */
    }
    .row {
        flex-direction: column; /* Stack containers vertically in each row on small screens */
    }
    .container {
        flex: 1 1 100%;
        min-width: 100%;
    }
}
    </style>

</head>
<body>
    <div class="wrapper">
        <div class="row">
            <div class="container">
                <h2>Supervision</h2>
                <form action="process-report-header.php" method="post">
                    <div class="form-group">
                        <label for="engineer">Drilling Engineer/Company</label>
                        <input type="text" id="engineer" name="engineer" placeholder="Enter Engineer/Company Name">
                    </div>
                    <div class="form-group">
                        <label for="geologist">Well Site Geologist</label>
                        <input type="text" id="geologist" name="geologist" placeholder="Enter Geologist Name">
                    </div>
                    <div class="form-group">
                        <label for="rep">Government Representative on Site</label>
                        <input type="text" id="rep" name="rep" placeholder="Enter Representative Name">
                    </div>
                    <div class="form-group">
                        <label for="toolpusher">Tool Pusher</label>
                        <input type="text" id="toolpusher" name="toolpusher" placeholder="Enter Tool Pusher Name">
                    </div>
                    <div class="form-group">
                        <label for="operator">Operator</label>
                        <input type="text" id="operator" name="operator" placeholder="Enter Operator Name">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Personnel</h2>
                <form>
                    <div class="form-group personnel-group">
                        <label for="company">Company</label>
                        <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="contractor">Contractor</label>
                        <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="service_co">Service Co</label>
                        <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service co">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="catering">Catering</label>
                        <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="other">Others</label>
                        <input type="number" id="other" name="other" oninput="calculateTotal()" placeholder="Enter number of others">
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" id="total" name="total" readonly placeholder="0">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <h2>Well Location & Profile</h2>
                <form>
                    <div class="form-group radio-group">
                        <label><input type="radio" name="location" value="On Shore"> On Shore</label>
                        <label><input type="radio" name="location" value="Shallow Water"> Shallow Water</label>
                        <label><input type="radio" name="location" value="Deep Water"> Deep Water</label>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select id="profile" name="profile">
                            <option value="Vertical">Vertical</option>
                            <option value="Horizontal">Horizontal</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Daily and Accumulative Costs</h2>
                <form>
                    <div class="form-group">
                        <label for="daily_cost">Daily Well Cost</label>
                        <input type="number" id="daily_cost" name="daily_cost" value="0">
                    </div>
                    <div class="form-group">
                        <label for="accum_cost">Accumulative Cost</label>
                        <input type="number" id="accum_cost" name="accum_cost" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="btn-group">
        <button type="submit">Submit</button>
    </div>
    <script>
        function calculateTotal() {
            const company = parseInt(document.getElementById('company').value) || 0;
            const contractor = parseInt(document.getElementById('contractor').value) || 0;
            const serviceCo = parseInt(document.getElementById('service_co').value) || 0;
            const catering = parseInt(document.getElementById('catering').value) || 0;
            const other = parseInt(document.getElementById('other').value) || 0;
            const total = company + contractor + serviceCo + catering + other;
            document.getElementById('total').value = total;
        }
    </script>
</body>
</html>

<?php require_once('footer.php'); ?>