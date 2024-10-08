<!-- HTML form for adding a new field -->

<form id="fieldForm" action="" method="POST">
    <div class="form-group">
        <label for="countrySelect">Select Country</label>
        <select id="countrySelect" name="countryId" required>
            <option value="">Select a Country</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-group">
     <input type="hidden" id="countryIdHidden" name="countryId" />
        <label for="fieldName">Field Name</label>
        <input type="text" id="fieldName" name="fieldName" required>
    </div>
    <div class="form-group">
        <h5 for="countrySetting">COUNTRY INITIAL SETTINGS</h5>
        <label>
            <input type="radio" name="mapSystem" value="mapSystem"> Map System
        </label>
        <label>
            <input type="radio" name="EPSGcode" value="EPSGcode"> EPSG Code
        </label>
    </div>
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
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Field</button>
    </div>
    <div id="responseMessage"></div>
</form>
