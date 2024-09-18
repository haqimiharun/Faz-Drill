<link rel="stylesheet" href="css/report_info/gas-reading.css">

    <div class="wrapper-gr">
    <h3 style="text-align: center;">Gas Reading</h3>
        <div class="row1-gr">
            <div class="container-gr">
                <form action="process-drill-fluids.php" method="post">
                <div id="myDIV-gr">
                    <div class="grid1">
                        <div class="form-group-gr">
                            <label for="mudType">Gas Type</label>
                            <input type="text" id="mudType" name="mudType" placeholder="Enter Mud Type">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudWeight">Depth Interval</label>
                            <input type="text" id="mudWeight" name="mudWeight" placeholder="Enter Mud Weight">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudViscosity">Gas Volume</label>
                            <input type="text" id="mudViscosity" name="mudViscosity" placeholder="Enter Mud Viscosity">
                        </div>
                    </div>
                    <div class="grid2">
                        <div class="form-group-gr">
                            <label for="mudPV">Gas/Oil Ratio (GOR)</label>
                            <input type="text" id="mudPV" name="mudPV" placeholder="Enter Mud PV">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudYP">Show Time</label>
                            <input type="text" id="mudYP" name="mudYP" placeholder="Enter Mud YP">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudGels10sec">Gas chromatograph (GC) Analysis</label>
                            <input type="text" id="mudGels10sec" name="mudGels10sec" placeholder="Enter 10 Sec Gels">
                        </div>
                    </div>
                    <div class="grid3">
                        <div class="form-group-gr">
                            <label for="mudGels30min">Hydrocarbon potential</label>
                            <input type="text" id="mudGels30min" name="mudGels30min" placeholder="Enter 30 Min Gels">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudAPI_WL">Correlation With Other Data:</label>
                            <input type="text" id="mudAPI_WL" name="mudAPI_WL" placeholder="Enter API WL">
                        </div>
                        <div class="form-group-gr">
                            <label for="mudHTHP">Environmental Concerns</label>
                            <input type="text" id="mudHTHP" name="mudHTHP" placeholder="Enter HTHP 300 Degree">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

