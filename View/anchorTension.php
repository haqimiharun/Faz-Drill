<link rel="stylesheet" href="css/report_info/anchorTension.css">

<div class="wrapper-anchor-tension">
    <div class="container-anchor-tension">
        <h2>Anchor Tension</h2>
        <form>
            <div class="form-group-anchor-tension">
                <table id="anchor-tension-table">
                    <thead>
                        <tr>
                            <th>Anchor Tension No.</th>
                            <th>Tension</th>
                            <th>Direction</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- First row with Anchor Tension No set to 1 -->
                        <tr>
                            <td><input type="text" class="anchor-tension-no" value="1" readonly></td>
                            <td><input type="text" name="tension[]"></td>
                            <td><input type="text" name="direction[]"></td>
                            <td><button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="add-btn" onclick="addRow()">Add Row</button>
            </div>
        </form>
    </div>
</div>

<script>
    let anchorTensionNo = 1; // Start with 1

    // Function to add a new row
    function addRow() {
        console.log("addRow called"); // Debugging line to confirm the function is triggered
        anchorTensionNo++; // Increment anchor tension number for each new row

        // Get the table body
        const tableBody = document.querySelector('#anchor-tension-table tbody');
        
        if (!tableBody) {
            console.error("Table body not found");
            return; // Exit if the table body does not exist
        }

        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="anchor-tension-no" value="${anchorTensionNo}" readonly></td>
            <td><input type="text" name="tension[]"></td>
            <td><input type="text" name="direction[]"></td>
            <td><button type="button" class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
        `;
    }

    // Function to delete a row
    function deleteRow(btn) {
        if (!btn || !btn.parentNode || !btn.parentNode.parentNode) {
            console.error("Button is not part of a row");
            return; // Exit the function if the button is not valid
        }
        
        const row = btn.parentNode.parentNode; // Get the row of the button
        row.parentNode.removeChild(row); // Remove the row from the table

        // Recalculate the Anchor Tension No for remaining rows
        const rows = document.querySelectorAll('.anchor-tension-no');
        anchorTensionNo = 0; // Reset number
        rows.forEach((input, index) => {
            anchorTensionNo = index + 1;
            input.value = anchorTensionNo; // Update the input value
        });
    }
</script>

