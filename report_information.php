<?php 
    $cur_page = basename(__FILE__);
    require_once('header.php'); 
?>

<div class="content">
    <section id="report-header">
        <?php include 'View/report-header.php'; ?> 
    </section>

    <section id="well-data">
        <?php include 'View/well-data.php'; ?>
    </section>

    <section id="depth-days">
        <?php include 'View/depth_days.php'; ?>
    </section>
    
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

    <section id="safetyCard">
        <?php include 'View/safetyCard.php'; ?>
    </section>

    <section id="personnel">
        <?php include 'View/personnel.php'; ?>
    </section>

    <section id="anchorTension">
        <?php include 'View/anchorTension.php'; ?>
    </section>

    <section id="safety">
        <?php include 'View/safety.php'; ?>
    </section>

    <section id="survey">
        <?php include 'View/survey.php'; ?>
    </section>
</div>

<?php require_once('footer.php'); ?>

<script>
    let rowCount = 1;

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
