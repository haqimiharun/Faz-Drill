
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-footer {
            margin-top: 20px;
        }
        .sbs {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        #map {
            height: 300px; /* Increased height for better visibility */
            width: 96%; /* Make the map fill the width */
            border: 1px solid #ccc; /* Optional: Add a border for better visibility */
        }
        .geoCoorDMS {
            display: none; /* Start hidden */
        }
        /* Show DD inputs when the DD radio is checked */
        #dd:checked ~ #geoCoorDD {
            display: block;
        }
        /* Show DMS inputs when the DMS radio is checked */
        #dms:checked ~ #geoCoorDMS {
            display: block;
        }
    </style>
<!-- HTML form for adding a new site -->
<form id="wellForm" action="" method="POST">
    <div class="form-group">
        <label for="countrySelect">Select Country</label>
        <select id="countrySelect" name="countryId" required>
            <option value="">Select a Country</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-group">
        <label for="fieldSelect">Select Field</label>
        <select id="fieldSelect" name="fieldId" required>
            <option value="">Select a Field</option>
            <!-- Field options will be populated based on selected country -->
        </select>
    </div>
    <div class="form-group">
        <label for="siteSelect">Select Site</label>
        <select id="siteSelect" name="siteId" required>
            <option value="">Select a Site</option>
            <!-- Site options will be populated based on selected country -->
        </select>
    </div>
    <div class="form-group">
        <label for="wellName">Well Name</label>
        <input type="text" id="wellName" name="wellName" required>
        <input type="hidden" id="siteIdHidden" name="siteId" />
        <input type="hidden" id="fieldIdHidden" name="fieldId" />
        <input type="hidden" id="countryIdHidden" name="countryId" />
    </div>
    <hr>
    <hr>
    <div class="form-group">
        <h5 for="wellSetting">WELL INITIAL SETTINGS</h5>
    </div>
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="wellSettingsTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="location-tab" data-toggle="tab" href="#locationTab" role="tab" aria-controls="locationTab" aria-selected="true">Location</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="uncertainty-tab" data-toggle="tab" href="#uncertaintyTab" role="tab" aria-controls="uncertaintyTab" aria-selected="false">Uncertainty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="template-tab" data-toggle="tab" href="#templateTab" role="tab" aria-controls="templateTab" aria-selected="false">Template</a>
        </li>
    </ul>


    <!-- Tab Content -->
    <div class="tab-content mt-2">
        <!-- Location Tab -->
        <div class="tab-pane fade " id="locationTab">
            <div class="sbs">
                <div class="sbs2">
                    <div class="form-group">
                        <label for="locEPSG">Location EPSG code</label>
                        <select type="text" id="locEPSG" name="locEPSG"></select>
                    </div>
                    <div class="form-group">
                        <label for="mapSys">Map System</label>
                        <select type="text" id="mapSys" name="mapSys"></select>
                    </div>
                    <div class="form-group">
                        <label for="Datum">Datum</label>
                        <select type="text" id="Datum" name="Datum"></select>
                    </div>
                    <div class="form-group">
                        <label for="Location">Location</label>
                        <select type="text" id="Location" name="Location"></select>
                    </div>
                    <div class="form-group">
                        <div class="sbs">
                            <label for="NorthRef">North Reference</label>
                            <label for="gridScale">Grid Scale</label>
                            <div>
                                <label>
                                    <input type="radio" name="northRef" value="true"> True
                                </label>
                                <label>
                                    <input type="radio" name="northRef" value="grid"> Grid
                                </label>
                                <label>
                                    <input type="radio" name="northRef" value="magnetic"> Magnetic
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="gridScale" value="true"> Apply grid scale to map coordinate export
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 for="wellSetting">LOCATION COORDINATES</h5>
                    </div>
                    <div class="sbs">
                        <div class="form-group">
                            <label for="EastingLoc">Easting</label>
                            <input style="padding-right:40px; text-align:right;" type="text" id="EastingLoc" name="EastingLoc"></input>
                            <span style="margin-left:-20px;">m</span>
                        </div>
                        <div class="form-group">
                            <label for="NorthingLoc">Northing</label>
                            <input style="padding-right:40px; text-align:right;" type="text" id="NorthingLoc" name="NorthingLoc"></input>
                            <span style="margin-left:-20px;">m</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 for="wellSetting">GEOGRAPHIC COORDINATES</h5>
                    </div>
                    <!-- Toggle button group for radio buttons -->
                    <div style="margin-top: -10px; margin-bottom: 10px;" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="geoCoorDD" id="dd"> DD
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="geoCoorDMS" id="dms"> DMS
                        </label>
                    </div>
                    <div id="geoCoorDD" class="geoCoorDD">
                        <div class="sbs">
                            <div class="form-group">
                                <label for="longitudeDD">Longitude</label>
                                <input style="padding-right:40px; text-align:right;" type="text" id="longitudeDD" name="longitudeDD">
                                <span style="margin-left:-20px;">°</span>
                            </div>
                            <div class="form-group">
                                <label for="latitudeDD">Latitude</label>
                                <input style="padding-right:40px; text-align:right;" type="text" id="latitudeDD" name="latitudeDD">
                                <span style="margin-left:-20px;">°</span>
                            </div>
                        </div>
                    </div>
                    <div id="geoCoorDMS" class="geoCoorDMS">
                        <p for="wellSetting">Longitude</p>
                        <div class="sbs">
                            <div class="sbs">
                                <div class="form-group">
                                    <input style="padding-right:40px; text-align:right;" type="text">
                                    <span style="margin-left:-20px;">°</span>
                                </div>
                                <div class="form-group">
                                    <input style="padding-right:40px; text-align:right;" type="text">
                                    <span style="margin-left:-20px;">'</span>
                                </div>
                            </div>
                            <div class="sbs">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input style="padding-right:40px; text-align:right;" type="text">
                                        <span style="margin-left:-20px;">"</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select type="text" id="longitude" name="longitude"></select>
                                </div>
                            </div>
                        </div>
                        <p for="wellSetting">Latitude</p>
                        <div class="sbs">
                            <div class="sbs">
                                <div class="form-group">
                                    <input style="padding-right:40px; text-align:right;" type="text">
                                    <span style="margin-left:-20px;">°</span>
                                </div>
                                <div class="form-group">
                                    <input style="padding-right:40px; text-align:right;" type="text">
                                    <span style="margin-left:-20px;">'</span>
                                </div>
                            </div>
                            <div class="sbs">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input style="padding-right:40px; text-align:right;" type="text">
                                        <span style="margin-left:-20px;">"</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select type="text" id="longitude" name="longitude"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sbs">
                        <div class="form-group">
                            <label for="cnvergence">Convergence(from true north)</label>
                            <input style="padding-right:40px; text-align:right;" type="text" id="EastingLoc" name="EastingLoc"></input>
                            <span style="margin-left:-20px;">°</span>
                        </div>
                        <div class="form-group">
                            <label for="scaleFactor">Scale Factor</label>
                            <input type="text" id="NorthingLoc" name="NorthingLoc"></input>
                        </div>
                    </div>
                </div>
                <div class="sbs2">
                    <div class="form-group">
                        <div id="map"></div> <!-- Map will be rendered here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Uncertainty Tab -->
        <div class="tab-pane fade" id="uncertaintyTab">
            <div class="form-grou1p">
                <label for="uncertaintyValue">Uncertainty Value</label>
                <input type="text" id="uncertaintyValue" name="uncertaintyValue" class="form-control" >
            </div>
        </div>

        <!-- Template Tab -->
        <div class="tab-pane fade" id="templateTab">
            <div class="form-group1">
                <label for="template">Template</label>
                <input type="text" id="template" name="template" class="form-control" >
            </div>
        </div>
    </div>

    <hr>
    
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Well</button>
    </div>
    
    <div id="responseMessage"></div>
</form>
