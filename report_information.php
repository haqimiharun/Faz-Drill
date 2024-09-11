<?php 
    $cur_page = basename(__FILE__);
    require_once('header.php'); 
?>

<div class="content">
    <section id="report-header">
        <?php include 'View/report-header.php'; ?> 
    </section id="well-info">
<div>
    <section id="well-info">
        <h1 style="text-align: center;">Well Information</h1>
    </section>
</div>
    <section id="well-data">
        <?php include 'View/well-data.php'; ?>
    </section>

    <section id="LOT-FIT">
        <?php include 'View/LOT-FIT.php'; ?>
    </section>

    <section id="formation-data">
        <?php include 'View/formation-data.php'; ?>
    </section>

    <section id="gas-reading">
        <?php include 'View/gas-reading.php'; ?>
    </section>

    <section id="rig-info">
        <?php include 'View/rig-info.php'; ?>
    </section>
<div>
    <section id="logi-mate">
        <h1 style="text-align: center;">Logistics & Material</h1>
    </section>
</div>
    <section id="consumables">
        <?php include 'View/consumables.php'; ?>
    </section>

    <section id="bulk-material">
        <?php include 'View/bulk-material.php'; ?>
    </section>

    <section id="weather_anchor">
        <?php include 'View/weather_anchor.php'; ?>
    </section>

    <section id="pob">
        <?php include 'View/pob.php'; ?>
    </section>

    <section id="vessels">
        <?php include 'View/vessels.php'; ?>
    </section>
<div>
    <section id="operation">
        <h1 style="text-align: center;">Operation</h1>
    </section>
</div>
    <section id="pipe-data">
        <?php include 'View/pipe-data.php'; ?>
    </section>

    <section id="BHA-data">
        <?php include 'View/BHA-data.php'; ?>
    </section>

    <section id="bit-data">
        <?php include 'View/bit-data.php'; ?>
    </section>

    <section id="survey">
        <?php include 'View/survey.php'; ?>
    </section>

    <section id="solidCtrlEquipment">
        <?php include 'View/solidCtrlEquipment.php'; ?>
    </section>

    <section id="mud-data">
        <?php include 'View/mud-data.php'; ?>
    </section>

    <section id="mud-vol">
        <?php include 'View/mud-vol.php'; ?>
    </section>

    <section id="mud-log">
        <?php include 'View/mud-log.php'; ?>
    </section>

    <section id="formation-eva">
        <?php include 'View/formation-eva.php'; ?>
    </section>

    <section id="velocities">
        <?php include 'View/velocities.php'; ?>
    </section>

    <section id="Operation-sum">
        <?php include 'View/Operation-sum.php'; ?>
    </section>

    <section id="daily-cost">
        <?php include 'View/daily-cost.php'; ?>
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
