<link rel="stylesheet" href="css/report_info/personnel.css">

<div class="wrapper-personnel">
    <div class="container-personnel">
        <form>
            <h2>Personnel</h2>

            <div class="form-group-personnel">
                <!-- Total Number of People (TNOP) - System Input -->
                <label for="total-people">Total No. of People:</label>
                <input type="text" id="total-people" name="total-people" disabled>

                <!-- Add button to add new TNOP row -->
                <button type="button" id="add-tno-row" class="add-btn">Add TNOP</button>

                <!-- TNOP Table -->
                <table id="tno-table">
                    <thead>
                        <tr>
                            <th>Company (TNOP)</th>
                            <th>People (TNOP)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="company-tno[]"></td>
                            <td><input type="number" name="people-tno[]" class="people-tno" oninput="calculateTotalPeople()"></td>
                            <td><button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Total Number of Beds (NOB) - System Input -->
                <label for="total-beds">No of Beds:</label>
                <input type="text" id="total-beds" name="total-beds" disabled>

                <!-- Add button to add new NOB row -->
                <button type="button" id="add-nob-row" class="add-btn">Add NOB</button>

                <!-- NOB Table -->
                <table id="nob-table">
                    <thead>
                        <tr>
                            <th>Company (NOB)</th>
                            <th>People (NOB)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="company-nob[]"></td>
                            <td><input type="number" name="people-nob[]" class="people-nob" oninput="calculateTotalBeds()"></td>
                            <td><button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>


<script>

// Function to add new row for TNOP
document.getElementById('add-tno-row').addEventListener('click', function() {
    const table = document.getElementById('tno-table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    const companyCell = newRow.insertCell(0);
    const peopleCell = newRow.insertCell(1);
    const actionCell = newRow.insertCell(2);

    companyCell.innerHTML = '<input type="text" name="company-tno[]">';
    peopleCell.innerHTML = '<input type="number" name="people-tno[]" class="people-tno" oninput="calculateTotalPeople()">';
    actionCell.innerHTML = '<button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button>';
});

// Function to add new row for NOB
document.getElementById('add-nob-row').addEventListener('click', function() {
    const table = document.getElementById('nob-table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    const companyCell = newRow.insertCell(0);
    const peopleCell = newRow.insertCell(1);
    const actionCell = newRow.insertCell(2);

    companyCell.innerHTML = '<input type="text" name="company-nob[]">';
    peopleCell.innerHTML = '<input type="number" name="people-nob[]" class="people-nob" oninput="calculateTotalBeds()">';
    actionCell.innerHTML = '<button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button>';
});

// Function to delete a row
function deleteRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    calculateTotalPeople();
    calculateTotalBeds();
}

// Function to calculate total people for TNOP
function calculateTotalPeople() {
    const peopleInputs = document.querySelectorAll('.people-tno');
    let total = 0;

    peopleInputs.forEach(input => {
        const value = parseInt(input.value) || 0;
        total += value;
    });

    document.getElementById('total-people').value = total;
}

// Function to calculate total beds for NOB
function calculateTotalBeds() {
    const peopleInputs = document.querySelectorAll('.people-nob');
    let total = 0;

    peopleInputs.forEach(input => {
        const value = parseInt(input.value) || 0;
        total += value;
    });

    document.getElementById('total-beds').value = total;
}


</script>