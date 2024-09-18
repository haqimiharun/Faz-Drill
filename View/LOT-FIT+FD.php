<link rel="stylesheet" href="css/report_info/LOT-FIT.css">

    <div class="wrapper-lf">
        
        <div class="row1-lf">
            <div class="container-lf">   
                <form action="#" method="post">
                    <h3 style="text-align: center;">LOT / FIT</h3>
                    <div id="myDIV-lf">
                        <div class="gridA">
                        <h2>Leaks Of Test</h2>
                            <div class="form-group-lf">
                                <label for="date-time-LOT">Date & Time</label>
                                <input type="datetime-local" id="date-time-LOT" name="date-time-LOT" placeholder="Enter Date and Time">
                            </div>
                            <div class="form-group-lf">
                                <label for="depth-LOT">Depth of LOT</label>
                                <div class="input_value">
                                    <input type="text" id="depth-LOT" name="depth-LOT" placeholder="Enter Depth of LOT">
                                    <input type="text" id="depth-LOT_value" name="depth-LOT_value">
                                </div>
                            </div>
                            <h3>Test Parameter</h3>
                            <div class="form-group-lf">
                                <label for="TP-pumprate">Pump rate during test</label>
                                <div class="input_value">
                                    <input type="text" id="TP-pumprate" name="TP-pumprate" placeholder="Enter Pump Rate during test">
                                    <input type="text" id="TP-pumprate_value" name="TP-pumprate_value">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="TP-maxSurfacePres">Maximum surface pressure achieved</label>
                                <div class="input_value">
                                    <input type="text" id="TP-maxSurfacePres" name="TP-maxSurfacePres" placeholder="Enter Maximum surface pressure achieved">
                                    <input type="text" id="TP-maxSurfacePres_value" name="TP-maxSurfacePres_value">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="TP-volPumped">Volume pumped before leak-off</label>
                                <div class="input_value">
                                    <input type="text" id="TP-volPumped" name="TP-volPumped" placeholder="Enter Volume pumped before leak-off">
                                    <input type="text" id="TP-volPumped_value" name="TP-volPumped_value">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="leakOff-pres">Leak-off Pressure</label>
                                <div class="input_value">
                                    <input type="text" id="leakOff-pres" name="leakOff-pres" placeholder="Enter Leak-off Pressure">
                                    <input type="text" id="leakOff-pres_value" name="leakOff-pres_value">
                                </div>
                            </div>
                        </div>
                        <div class="gridB">
                        <h2>Formation Intergrity Test</h2>
                            <div class="form-group-lf">
                                <label for="date-time-FIT">Date & Time</label>
                                <input type="datetime-local" id="date-time-FIT" name="date-time-FIT" placeholder="Enter Date and Time">
                            </div>
                            <div class="form-group-lf">
                                <label for="depth-FIT">Depth of FIT</label>
                                <div class="input_value">
                                    <input type="text" id="depth-FIT" name="depth-FIT" placeholder="Enter Depth of FIT">
                                    <input type="text" id="depth-FIT_value" name="depth-FIT_value">
                                </div>
                            </div>
                            <h3>Test Parameter</h3>
                            <div class="form-group-lf">
                                <label for="minPressFIT">Minimum Pressure of FIT</label>
                                <div class="input_value">
                                    <input type="text" id="minPressFIT" name="minPressFIT" placeholder="Enter Pump Rate during test">
                                    <input type="text" id="minPressFIT_value" name="minPressFIT_value">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="maxPressFIT">Maximum Pressure of FIT</label>
                                <div class="input_value">
                                    <input type="text" id="maxPressFIT" name="maxPressFIT" placeholder="Enter Maximum surface pressure achieved">
                                    <input type="text" id="maxPressFIT_value" name="maxPressFIT_value">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="testDurationFIT">Test Duration for FIT</label>
                                <div class="input_value">
                                    <input type="text" id="testDurationFIT" name="testDurationFIT" placeholder="Enter Test Duration for FIT">
                                    <input type="text" id="testDurationFIT_value" name="testDurationFIT_value">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#" method="post">
                    <h3 style="text-align: center;">Formation Data</h3>
                    <div id="myDIV-lf">
                        <div class="gridA">
                            <div class="form-group-lf">
                                <label for="formation_name">Formation Name</label>
                                <input type="text" id="formation_name" name="formation_name" placeholder="Enter Formation Name">
                            </div>
                            <div class="form-group-lf">
                                <label for="formation_depth">Formation Depth</label>
                                <div class="input_value">
                                    <input type="text" id="formation_depth" name="formation_depth" placeholder="Enter Formation Depth">
                                    <input type="text" id="depth-LOT" name="depth-LOT">
                                </div>
                            </div>
                            <div class="form-group-lf">
                                <label for="formation_tops">Formation Tops</label>
                                <input type="text" id="formation_tops" name="formation_tops" placeholder="Enter Formation Tops">
                            </div>
                            <div class="form-group-lf">
                                <label for="lithology">Lithology</label>
                                <input type="text" id="lithology" name="lithology" placeholder="Enter Lithology">
                            </div>
                            <div class="form-group-lf">
                                <label for="porosity">Porosity</label>
                                <input type="text" id="porosity" name="porosity" placeholder="Enter Porosity">
                            </div>
                            <div class="form-group-lf">
                                <label for="permeability">Permeability</label>
                                <input type="text" id="permeability" name="permeability" placeholder="Enter Permeability">
                            </div>
                            <div class="form-group-lf">
                                <label for="form_press">Formation Pressure</label>
                                <input type="text" id="form_press" name="form_press" placeholder="Enter Formation Pressure">
                            </div>
                        </div>
                        <div class="gridB">
                            <div class="form-group-lf">
                                <label for="form_temp">Formation Temperature</label>
                                <input type="text" id="form_temp" name="form_temp" placeholder="Enter Formation Temperature">
                            </div>
                            <div class="form-group-lf">
                                <label for="fluid_type">Fluid Type</label>
                                <input type="text" id="fluid_type" name="fluid_type" placeholder="Enter Fluid Type">
                            </div>
                            <div class="form-group-lf">
                                <label for="gas_shows">Gas Shows</label>
                                <input type="text" id="gas_shows" name="gas_shows" placeholder="Enter Gas Shows">
                            </div>
                            <div class="form-group-lf">
                                <label for="cut_desc">Cutting Description</label>
                                <input type="text" id="cut_desc" name="cut_desc" placeholder="Enter Cutting Description">
                            </div>
                            <div class="form-group-lf">
                                <label for="shale_density">Shale Density</label>
                                <input type="text" id="shale_density" name="shale_density" placeholder="Enter Shale Density">
                            </div>
                            <div class="form-group-lf">
                                <label for="resistivity">Resistivity</label>
                                <input type="text" id="resistivity" name="resistivity" placeholder="Enter Resistivity">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



   