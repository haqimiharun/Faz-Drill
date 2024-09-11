
    <div class="wrapper">
        <h1 style="text-align: center;">Well Data</h1>
        <div class="row1">
            <div class="container">
                <h2>Well Data</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="fieldName">Field Name</label>
                        <input type="text" id="fieldName" name="fieldName" placeholder="Enter Field Name">
                    </div>
                    <div class="form-group">
                        <label for="wellName">Well Name</label>
                        <input type="text" id="wellName" name="wellName" placeholder="Enter Well Name">
                    </div>
                    <div class="form-group">
                        <label for="wellbore">Wellbore</label>
                        <input type="text" id="wellbore" name="wellbore" placeholder="Enter Wellbore">
                    </div>
                    <div class="form-group">
                        <label for="mudPV">Well Type</label>
                        <select id="mudPV" name="mudPV">
                            <option value="" disabled selected>Select Well Type</option>
                            <option value="type1">Wildcat</option>
                            <option value="type2">Exploration</option>
                            <option value="type3">Development</option>
                            <option value="type3">Infill</option>
                            <option value="type3">Injection</option>
                        </select>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="TVD-planDepth">Plan Depth (TVD), Depth</label>
                        <input type="text" id="TVD-planDepth" name="TVD-planDepth" placeholder="Enter Plan Depth (TVD)">
                    </div>
                    <div class="form-group">
                        <label for="MD-planDepth">Plan Depth (MD), Depth</label>
                        <input type="text" id="MD-planDepth" name="MD-planDepth" placeholder="Enter Plan Depth (MD)">
                    </div>
                    <div class="form-group">
                        <label for="date-time">Date & Time</label>
                        <input type="datetime-local" id="date-time" name="date-time" placeholder="Enter Date and Time">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Target Formation</h2>

                <form action="#" method="post">
                    <div class="form-group">
                        <label for="Formation-Name">Formation Name</label>
                        <input type="text" id="Formation-Name" name="Formation-Name" placeholder="Enter Formation Name">
                    </div>
                    <div class="form-group">
                        <label for="Formation-Depth">Formation Depth, Depth</label>
                        <input type="text" id="Formation-Depth" name="Formation-Depth" placeholder="Enter Formation Depth">
                    </div>
                    <div class="form-group">
                        <label for="Formation-Tops">Formation Tops, Depth</label>
                        <input type="text" id="Formation-Tops" name="Formation-Tops" placeholder="Enter Formation Tops">
                    </div>
                    <div class="form-group">
                        <label for="Type-of-Lithology">Type of Lithology</label>
                        <input type="text" id="Type-of-Lithology" name="Type-of-Lithology" placeholder="Enter Type of Lithology">
                    </div>
                    <div class="form-group">
                        <label for="Porosity">Porosity, Φ</label>
                        <input type="text" id="Porosity" name="Porosity" placeholder="Enter Porosity">
                    </div>
                    <div class="form-group">
                        <label for="Darcys(d)-Permeability">Permeability, K</label>
                        <input type="text" id="Permeability" name="Permeability" placeholder = "Enter Permeability">
                    </div>
                    <div class="form-group">
                        <label for="Fomartion-Pressure">Formation Pressure</label>
                        <input type="text" id="Formation-Pressure" name="Formation-Pressure" placeholder = "Enter Formation Pressure">
                    </div>
                    <div class="form-group">
                        <label for="Fomartion-Temperature">Formation Temperature</label>
                        <input type="text" id="Formation-Temperature" name="Formation-Temperature" placeholder = "Enter Formation Temperature">
                    </div>
                    <div class="form-group">
                    <!-- ada redundant data : nnti just call back untk data dibawah -->
                        <label for="Fluid-Type">Fluid Type</label> 
                        <input type="text" id="Fluid-Type" name="Fluid-Type" placeholder = "Enter Fluid Type"> 
                    </div>
                    <div class="form-group">
                    <!-- ada redundant data : nnti just call back untk data dibawah -->
                        <label for="Gas-Shows">Gas Shows</label> 
                        <input type="text" id="Gas-Shows" name="Gas-Show" placeholder = "Enter Gas Shows"> 
                    </div>
                    <div class="form-group">
                    <!-- ada redundant data : nnti just call back untk data dibawah -->
                        <label for="Cutting-Description">Gas Description</label> 
                        <input type="text" id="Gas-Description" name="Gas-Description" placeholder = "Enter Gas Description"> 
                    </div>
                    <div class="form-group">
                    <!-- ada redundant data : nnti just call back untk data dibawah -->
                        <label for="Shale-Density">Shale Density</label> 
                        <input type="text" id="Shale-Density" name="Shale-Density" placeholder = "Enter Shale Density"> 
                    </div>
                    <div class="form-group">
                    <!-- ada redundant data : nnti just call back untk data dibawah -->
                        <label for="Resistivity">Resistivity</label> 
                        <input type="text" id="Resistivity" name="Resistivity" placeholder = "Enter Resistivity"> 
                    </div>
                </form>

            </div>
        </div>

        <div class="row1">
            <div class="container">
                <h2>Well Trajectory</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                    <form action="process.php" method="POST">
                        <div class="table-wrapper">
                            <table class="table-custom" id="inputTable">
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
                    </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
