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
