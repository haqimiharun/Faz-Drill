<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
       .mapContainer {
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack children vertically */
            height: 80vh; /* Full viewport height or any fixed height */
            width: 100%; /* Make the container full width */
        }
        #map {
            flex: 1; /* Allow the map to grow and fill the remaining space */
            width: 100%; /* Make the map fill the width */
            border: 1px solid #ccc; /* Optional: Add a border for better visibility */
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
<form id="siteForm" action="" method="POST">
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
        <label for="siteName">Site Name</label>
        <input type="text" id="siteName" name="siteName" required>
        <input type="hidden" id="fieldIdHidden" name="fieldId" />
        <input type="hidden" id="countryIdHidden" name="countryId" />

    </div>
<hr>
    <hr>
    <div class="form-group">
        <h5 for="wellSetting">WELL INITIAL SETTINGS</h5>
    </div>

    <!-- Tab Content -->
    <div class="tab-content mt-2">
        <!-- Location Tab -->
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
                     <input type="radio" id="dd_site" name="geoCoor" checked>
                    <label for="dd">DD Coordinates</label>
                    <input type="radio" id="dms_site" name="geoCoor">
                    <label for="dms">DMS Coordinates</label>
                </div>
                <div id="geoCoorDD_site" class="geoCoorDD">
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
                <div id="geoCoorDMS_site" class="geoCoorDMS">
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
                <div class="mapContainer">
                    <div id="map"></div> <!-- Map will be rendered here -->
                </div>
            </div>
        </div>
    </div>

    <hr>
    
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Well</button>
    </div>
    
    <div id="responseMessage"></div>
</form>
