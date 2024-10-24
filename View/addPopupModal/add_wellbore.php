<!-- HTML form for adding a new site -->
<form id="wellboreForm" action="" method="POST">
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
        <label for="wellSelect">Select Well</label>
        <select id="wellSelect" name="wellId" required>
            <option value="">Select a Well</option>
            <!-- Well options will be populated based on selected country -->
        </select>
    </div>
    <div class="form-group">
        <label for="wellboreName">Wellbore Name</label>
        <input type="text" id="wellboreName" name="wellboreName" required>
        <input type="hidden" id="wellIdHidden" name="wellId" />
        <input type="hidden" id="siteIdHidden" name="siteId" />
        <input type="hidden" id="fieldIdHidden" name="fieldId" />
        <input type="hidden" id="countryIdHidden" name="countryId" />
    </div>
    <hr>
    <hr>
    <div class="form-group">
        <label for="rigConfig">Rig Configuration</label>
        <select id="rigConfig" name="rigConfig" >
            <option value="">Rig Configuration</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-group">
        <h5 for="wellboreSetting">WELLBORE INITIAL SETTINGS</h5>
        <input type="checkbox" name="sideTrack" value="true"> Apply as a sidetrack
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Wellbore</button>
    </div>
    <div id="responseMessage"></div>
</form>
