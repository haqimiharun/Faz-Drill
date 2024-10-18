<link rel="stylesheet" href="css/report_info/personnel.css">

<div class="wrapper">
    <h3 style="text-align: center;">Personnel On Board</h3>
    <div class="row1">
        <div class="container">
            <h2>Personnel On Board</h2>
            <!-- Display the total number of people -->
            <label>Total Number of People: <span id="total-people">0</span></label>
            <form action="process.php" method="POST">
                <div class="table-wrapper">
                    <table class="table-custom" id="inputTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Company Name</th>
                                <th>Arrival Date</th>
                                <th>Exit Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Start with one row -->
                            <tr>
                                <td>
                                    <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                </td>
                                <td><input type="text" name="name[]" oninput="updateTotalPeople()" /></td>
                                <td><input type="text" name="occupation[]" /></td>
                                <td><input type="text" name="company_name[]" /></td>
                                <td><input type="date" name="arrival_date[]" /></td>
                                <td><input type="date" name="exit_date[]" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- New table for Cabin/Bunk assignments -->
                <div class="table-wrapper" style="margin-top: 20px;">
                    <h3>Beds Assignments</h3>
                    <label>Total Number of Beds: <span id="total-bunks">0</span></label>
                    <table class="table-custom" id="bunkTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Beds Number</th>
                                <th>Assigned Personnel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <button type="button" class="add-bunk-row" onclick="addBunkRow(this)">+</button>
                                </td>
                                <td><input type="text" name="bunk_number[]" oninput="updateTotalBunks()" /></td>
                                <td><input type="text" name="assigned_personnel[]" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function addRow(button) {
    const table = button.closest('table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `
        <td>
            <button type="button" class="delete-row" onclick="deleteRow(this)">-</button>
        </td>
        <td><input type="text" name="name[]" oninput="updateTotalPeople()" /></td>
        <td><input type="text" name="occupation[]" /></td>
        <td><input type="text" name="company_name[]" /></td>
        <td><input type="date" name="arrival_date[]" /></td>
        <td><input type="date" name="exit_date[]" /></td>
    `;
    updateTotalPeople(); // Update total after adding a new row
}

function deleteRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    updateTotalPeople(); // Update total after deleting a row
}

// Function to update total number of people
function updateTotalPeople() {
    const names = document.querySelectorAll('input[name="name[]"]');
    let total = 0;

    names.forEach(input => {
        if (input.value.trim() !== '') {
            total++;
        }
    });

    document.getElementById('total-people').textContent = total;
}

function addBunkRow(button) {
    const table = button.closest('table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `
        <td>
            <button type="button" class="delete-row" onclick="deleteBunkRow(this)">-</button>
        </td>
        <td><input type="text" name="bunk_number[]" oninput="updateTotalBunks()" /></td>
        <td><input type="text" name="assigned_personnel[]" /></td>
    `;
    updateTotalBunks(); // Update total after adding a new bunk row
}

function deleteBunkRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    updateTotalBunks(); // Update total after deleting a bunk row
}

// Function to update total number of bunks
function updateTotalBunks() {
    const bunks = document.querySelectorAll('input[name="bunk_number[]"]');
    let total = 0;

    bunks.forEach(input => {
        if (input.value.trim() !== '') {
            total++;
        }
    });

    document.getElementById('total-bunks').textContent = total;
}
</script>
