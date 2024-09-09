    <div class="wrapper">
        <div class="row1">
            <div class="container">
                <h2>Personnel On Board</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                    <form action="process.php" method="POST">
                        <div class="table-wrapper">
                            <table class="table-custom" id="inputTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Occupation</th>
                                        <th>Company Name</th>
                                        <th>Company No.</th>
                                        <th>Arrival Date</th>
                                        <th>Day On Rig</th>
                                        <th>Exit Date</th>
                                        <th>Cabin/Bunk</th>
                                        <th>Lifeboat</th>
                                        <th>Emergency Member</th>
                                        <th>Category</th>
                                        <th>Shift</th>
                                        <th>Crew</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start with one row -->
                                    <tr>
                                        <td>
                                            <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                        </td>
                                        <td><input type="text" name="input_1_1" /></td>
                                        <td><input type="text" name="input_1_2" /></td>
                                        <td><input type="text" name="input_1_3" /></td>
                                        <td><input type="text" name="input_1_4" /></td>
                                        <td><input type="text" name="input_1_5" /></td>
                                        <td><input type="text" name="input_1_6" /></td>
                                        <td><input type="text" id="dayOnRig_1" name="input_1_7" /></td>
                                        <td><input type="text" name="input_1_8" /></td>
                                        <td><input type="text" name="input_1_9" /></td>
                                        <td><input type="text" name="input_1_10" /></td>
                                        <td><input type="text" name="input_1_11" /></td>
                                        <td><input type="text" name="input_1_12" /></td>
                                        <td><input type="text" name="input_1_13" /></td>
                                        <td><input type="text" name="input_1_14" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>

<script>
                let rowCount = 1;

                function addRow(button) {
                    const currentRow = button.parentElement.parentElement;
                    const inputs = currentRow.querySelectorAll('input[type="text"]');
                    let allFilled = true;

                    // Check if all input fields are filled in the current row
                    inputs.forEach(input => {
                        if (input.value.trim() === '') {
                            allFilled = false;
                        }
                    });

                    if (allFilled) {
                        rowCount++;
                        const table = document.getElementById("inputTable").getElementsByTagName('tbody')[0];
                        const newRow = table.insertRow();

                        for (let i = 0; i < 15; i++) {
                            const newCell = newRow.insertCell(i);
                            if (i === 0) {
                                newCell.innerHTML = `
                                    <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                `;
                            } else if (i === 7) {
                                newCell.innerHTML = `<input type="text" id="dayOnRig_${rowCount}" name="input_${rowCount}_${i}" readonly />`;
                            } else {
                                newCell.innerHTML = `<input type="text" id="input_${rowCount}_${i}" name="input_${rowCount}_${i}" oninput="updateDayOnRig(this)" />`;
                            }
                        }

                        // Disable the "Add" button of the current row
                        button.disabled = true;
                    } else {
                        alert("Please fill in all fields before adding a new row.");
                    }
                }

                function updateDayOnRig(input) {
                    const row = input.closest('tr');
                    const arrivalDateInput = row.querySelector('input[name*="input_"][name$="_6"]');
                    const exitDateInput = row.querySelector('input[name*="input_"][name$="_8"]');
                    const dayOnRigInput = row.querySelector('input[name*="input_"][name$="_7"]');

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

                // Initial check on page load
                document.querySelectorAll('tbody tr').forEach(row => {
                    const arrivalDateInput = row.querySelector('input[name*="input_"][name$="_6"]');
                    const exitDateInput = row.querySelector('input[name*="input_"][name$="_8"]');
                    const dayOnRigInput = row.querySelector('input[name*="input_"][name$="_7"]');

                    arrivalDateInput.addEventListener('change', () => updateDayOnRig(arrivalDateInput));
                    exitDateInput.addEventListener('change', () => updateDayOnRig(exitDateInput));
                });
            </script>

            </div>
        </div>
    </div>
