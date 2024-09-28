<?php 
    $cur_page = basename(__FILE__);
    require_once('header.php'); 
?>

<div class="content">
<div>
    <section id="report-header">
        <h1 style="text-align: center;">Report Header</h1>
    </section>
</div>
    <section id="report-header">
        <?php include 'View/report-header.php'; ?> 
    </section>
    <section id="well-data">
        <?php include 'View/well-data.php'; ?>
    </section>
    <section id="depth-days">
        <?php include 'View/depth_days.php'; ?>
    </section>
<div>
    <section id="operation">
        <h1 style="text-align: center;">Operation</h1>
    </section>
</div>
    <section id="bit-data">
        <?php include 'View/bit-data.php'; ?>
    </section>

    <section id="mud-check">
        <?php include 'View/mud-check.php'; ?>
    </section>

    <section id="BHA-data">
        <?php include 'View/BHA-data.php'; ?>
    </section>

    <section id="BHA-compoment">
        <?php include 'View/bha_component.php'; ?>
    </section>
    
    <section id="gas-reading">
        <?php include 'View/gas-reading.php'; ?>
    </section>

    <section id="mud-vol">
        <?php include 'View/mud-vol.php'; ?>
    </section>

    <section id="pumpHydraulics">
        <?php include 'View/pump-hydraulics.php'; ?>
    </section>
    
    <section id="pipe-data">
        <?php include 'View/pipe-data.php'; ?>
    </section>

    <section id="solidCtrlEquipment">
        <?php include 'View/solidCtrlEquipment.php'; ?>
    </section>

    <section id="LOT-FIT+FD">
        <?php include 'View/LOT-FIT+FD.php'; ?>
    </section>

    <section id="supportCraft">
        <?php include 'View/supportCraft.php'; ?>
    </section>

    <section id="bulks">
        <?php include 'View/bulks.php'; ?>
    </section>

    <section id="weather">
        <?php include 'View/weather.php'; ?>
    </section>
</div>

<?php require_once('footer.php'); ?>

<script>
    let rowCount = 1;

    // Function to add a new row
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

            // Insert new cells for each column
            for (let i = 0; i < 14; i++) {
                const newCell = newRow.insertCell(i);
                if (i === 0) {
                    newCell.innerHTML = `
                        <button type="button" class="add-row" onclick="addRow(this)">+</button>
                    `;
                } else if (i === 7) {
                    newCell.innerHTML = `<input type="text" id="dayOnRig_${rowCount}" name="input_${rowCount}_${i}" />`;
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

    // Function to update the "Day On Rig" field
    function updateDayOnRig(input) {
        const row = input.closest('tr');
        const arrivalDateInput = row.querySelector('input[name*="input_"][name$="_6"]');
        const exitDateInput = row.querySelector('input[name*="input_"][name$="_8"]');
        const dayOnRigInput = row.querySelector('input[name*="input_"][name$="_7"]');

        const arrivalDate = new Date(arrivalDateInput.value);
        const exitDate = new Date(exitDateInput.value);

        // Calculate the difference in days between arrival and exit dates
        if (!isNaN(arrivalDate.getTime()) && !isNaN(exitDate.getTime())) {
            const timeDiff = exitDate - arrivalDate;
            const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // Include both arrival and exit days
            dayOnRigInput.value = dayDiff;
        } else {
            dayOnRigInput.value = '';
        }
    }

    // Initial check on page load for existing rows
    document.querySelectorAll('tbody tr').forEach(row => {
        const arrivalDateInput = row.querySelector('input[name*="input_"][name$="_6"]');
        const exitDateInput = row.querySelector('input[name*="input_"][name$="_8"]');
        
        // Attach event listeners to arrival and exit date inputs
        if (arrivalDateInput && exitDateInput) {
            arrivalDateInput.addEventListener('change', () => updateDayOnRig(arrivalDateInput));
            exitDateInput.addEventListener('change', () => updateDayOnRig(exitDateInput));
        }
    });
</script>
