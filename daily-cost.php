<div class="wrapper">
    <div class="row1">
        <div class="container">
            <h2>Daily Cost</h2>
            <form action="process.php" method="POST">
                <div class="table-wrapper">
                    <table class="table-custom" id="inputTable">
                        <tbody>
                            <tr>                                
                                <th class="small-column"></th>
                                <th class="small-column">AFE</th>
                                <th class="small-column"></th>
                                <th class="small-column"><input type="datetime-local" id="date-time-LOT" name="date-time-LOT" placeholder="Enter Date and Time"></th>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                            </tr>
                            <tr>                                
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2" class="small-column">Road & Location</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_2" /></td>
                                 <th colspan="1"></th>
                            </tr>
                        
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Wellhead & Tubulars</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_8" /></td>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Drilling Rig</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_14" /></td>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Services</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_14" /></td>
                                 <th colspan="1"></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let rowCount = 1;

    function addRow(button) {
        rowCount++;
        const table = document.getElementById("inputTable").getElementsByTagName('tbody')[0];

        // Create new rows for each field
        const fields = ['Name', 'Date Of Birth', 'Occupation', 'Company Name', 'Company No.', 'Arrival Date', 'Day On Rig', 'Exit Date', 'Cabin/Bunk', 'Lifeboat', 'Emergency Member', 'Category', 'Shift', 'Crew'];

        fields.forEach((field, index) => {
            const newRow = table.insertRow();
            const newCell1 = newRow.insertCell(0);
            const newCell2 = newRow.insertCell(1);

            newCell1.innerText = field;
            if (index === 6) {
                newCell2.innerHTML = `<input type="text" id="dayOnRig_${rowCount}" name="input_${rowCount}_${index + 1}" readonly />`;
            } else {
                newCell2.innerHTML = `<input type="text" name="input_${rowCount}_${index + 1}" oninput="updateDayOnRig(this)" />`;
            }
        });

        // Add a new row for the button
        const newRow = table.insertRow();
        const newCell = newRow.insertCell(0);
        newCell.colSpan = 2;
        newCell.innerHTML = `<button type="button" class="add-row" onclick="addRow(this)">+</button>`;

        // Disable the "Add" button of the current row
        button.disabled = true;
    }

    function updateDayOnRig(input) {
        const row = input.closest('tr');
        const table = row.closest('table');
        const rowIndex = [...table.rows].indexOf(row) - 5; // Adjust for header rows
        const arrivalDateInput = table.querySelector(`input[name="input_${rowIndex}_6"]`);
        const exitDateInput = table.querySelector(`input[name="input_${rowIndex}_8"]`);
        const dayOnRigInput = table.querySelector(`input[name="input_${rowIndex}_7"]`);

        const arrivalDate = new Date(arrivalDateInput.value);
        const exitDate = new Date(exitDateInput.value);

        if (!isNaN(arrivalDate.getTime()) && !isNaN(exitDate.getTime())) {
            const timeDiff = exitDate - arrivalDate;
            const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // Adding 1 to include both arrival and exit days
            dayOnRigInput.value = dayDiff;
        } else {
            dayOnRigInput.value = '';
        }
    }
</script>
