<link rel="stylesheet" href="css/report_info/well-data.css">

<div class="wrapper-wd">
    <!-- First Row: Well Data & Target Formation -->
    <div class="row1-wd">
        <div class="container-wd">
            <form action="#" method="post">
            <h2>Well Data</h2>
                <div class="form-group-wd">
                    <label for="fieldName">Field Name</label>
                    <input type="text" id="fieldName" name="fieldName" disabled>
                </div>
                <div class="form-group-wd">
                    <label for="wellName">Well Name</label>
                    <input type="text" id="wellName" name="wellName" disabled>
                </div>
                <div class="form-group-wd">
                    <label for="wellbore">Wellbore</label>
                    <input type="text" id="wellbore" name="wellbore" disabled>
                </div>
                <div class="form-group-wd">
                    <label for="wellType">Well Type</label>
                    <select id="wellType" name="wellType">
                        <option value="" disabled selected>Select Well Type</option>
                        <option value="wildcat">Wildcat</option>
                        <option value="exploration">Exploration</option>
                        <option value="development">Development</option>
                        <option value="infill">Infill</option>
                        <option value="injection">Injection</option>
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="wellLoc">Well Location</label>
                    <div>
                        <input type="radio" id="useLatLong" name="locationType" value="latlong">
                        <label for="useLatLong">Use Longitude and Latitude</label>
                    </div>
                    <div>
                        <input type="radio" id="useNorthingEasting" name="locationType" value="northingeasting">
                        <label for="useNorthingEasting">Use Northing and Easting</label>
                    </div>
                    <input type="text" id="wellLoc" name="wellLoc" placeholder="Enter Well Location">
                </div>
                <div class="form-group-wd">
                    <label for="TVD-planDepth">Plan Depth (TVD)</label>
                    <div class="input_value">
                        <input type="text" id="TVD-planDepth" name="TVD-planDepth" placeholder="Enter Plan Depth (TVD)">
                        <input type="text" id="TVD-planDepth_value" name="TVD-planDepth_value">
                    </div>
                </div>
                <div class="form-group-wd">
                    <label for="MD-planDepth">Plan Depth (MD)</label>
                    <div class="input_value">
                        <input type="text" id="MD-planDepth" name="MD-planDepth" placeholder="Enter Plan Depth (MD)">
                        <input type="text" id="MD-planDepth_value" name="MD-planDepth_value">
                    </div>
                </div>
            </form>
       
            <form action="#" method="post">
            <div id="myDIV">
                <div class="tfT">
                <h2 class="item1">Target Formation</h2>
                </div>
                <div class="tfA">
                    <div class="form-group-wd">
                        <label for="Formation-Name">Formation Name</label>
                        <input type="text" id="Formation-Name" name="Formation-Name" placeholder="Enter Formation Name">
                    </div>
                    <div class="form-group-wd">
                        <label for="Formation-Depth">Formation Depth</label>
                        <div class="input_value">
                            <input type="text" id="Formation-Depth" name="Formation-Depth" placeholder="Enter Formation Depth">
                            <input type="text" id="Formation-Depth_value" name="Formation-Depth_value">
                        </div>
                    </div>
                    <div class="form-group-wd">
                        <label for="Formation-Tops">Formation Tops</label>
                        <div class="input_value">
                            <input type="text" id="Formation-Tops" name="Formation-Tops" placeholder="Enter Formation Tops">
                            <input type="text" id="Formation-Tops_value" name="Formation-Tops_value">
                        </div>
                    </div>
                    <div class="form-group-wd">
                        <label for="Type-of-Lithology">Type of Lithology</label>
                        <input type="text" id="Type-of-Lithology" name="Type-of-Lithology" placeholder="Enter Type of Lithology">
                    </div>
                    <div class="form-group-wd">
                        <label for="Porosity">Porosity, Φ</label>
                        <div class="input_value">
                            <input type="text" id="Porosity" name="Porosity" placeholder="Enter Porosity">
                            <input type="text" id="Porosity_value" name="Porosity_value">
                        </div>
                    </div>
                </div>
                <div class="tfB">               
                    <div class="form-group-wd">
                        <label for="Permeability">Permeability, K</label>
                        <div class="input_value">
                            <input type="text" id="Permeability" name="Permeability" placeholder="Enter Permeability">
                            <input type="text" id="Permeability_value" name="Permeability_value">
                        </div>
                    </div>
                    <div class="form-group-wd">
                        <label for="Formation-Pressure">Formation Pressure</label>
                        <div class="input_value">
                            <input type="text" id="Formation-Pressure" name="Formation-Pressure" placeholder="Enter Formation Pressure">
                            <input type="text" id="Formation-Pressure_value" name="Formation-Pressure_value">
                        </div>
                    </div>
                    <div class="form-group-wd">
                        <label for="Formation-Temperature">Formation Temperature</label>
                        <div class="input_value">
                            <input type="text" id="Formation-Temperature" name="Formation-Temperature" placeholder="Enter Formation Temperature">
                            <input type="text" id="Formation-Temperature_value" name="Formation-Temperature_value">
                        </div>
                    </div>
                    <div class="form-group-wd">
                        <label for="Fluid-Type">Fluid Type</label>
                        <input type="text" id="Fluid-Type" name="Fluid-Type" placeholder="Enter Fluid Type">
                    </div>
                    <div class="form-group-wd">
                        <label for="Gas-Shows">Gas Shows</label>
                        <input type="text" id="Gas-Shows" name="Gas-Shows" placeholder="Enter Gas Shows">
                    </div>
                </div>
                <div class="tfC">
                <h2>Well Trajectory</h2>
                    <div class="table-wrapper-wd">
                        <table class="table-custom-wd" id="inputTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Measured Depth</th>
                                    <th>Closure</th>
                                    <th>Inclination</th>
                                    <th>Azimuth</th>
                                    <th>True Vertical Depth</th>
                                    <th>Coordinates</th>
                                    <th>V.Sec</th>
                                    <th>Dogleg</th>
                                    <th>Toolface</th>
                                    <th>Build</th>
                                    <th>Turn</th>
                                    <th>Section Type</th>
                                    <th>Target</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td><input type="text" name="input_1_7" /></td>
                                    <td><input type="text" name="input_1_8" /></td>
                                    <td><input type="text" name="input_1_9" /></td>
                                    <td><input type="text" name="input_1_10" /></td>
                                    <td><input type="text" name="input_1_11" /></td>
                                    <td><input type="text" name="input_1_12" /></td>
                                    <td><input type="text" name="input_1_13" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
