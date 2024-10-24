<!-- HTML form for adding a new site -->
<style>
.grid_2 {
    margin-top: 10px;
    margin-bottom: -5px;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Create 2 equal columns */
            gap: 10px; /* Adjust the space between columns */
        }
</style>
<form id="reportForm" action="" method="POST">
    <div class="form-group">
        <label for="countrySelect">Select Country</label>
        <select id="countrySelect" name="countryId" required>
            <option value="">Select a Country</option>
            <!-- Country options will be populated by AJAX -->
        </select>
        <!-- Hidden dropdown for adding a new country -->
        <div id="newCountryDropdown" style="display: none;">
            <select id="newCountrySelect" name="newCountryId">
                <option value="addNewCountry">Select a Country</option>
                <!-- New country options will be populated by AJAX -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldSelect">Select Field</label>
        <select id="fieldSelect" name="fieldId" required>
            <option value="">Select a Field</option>
            <!-- <option value="addNewField">Add New Field</option> -->
            <!-- Field options will be populated based on selected country -->
        </select>
        <!-- Hidden input for adding a new field -->
        <div id="newFieldDropdown" style="display: none;">
            <input type="text" id="newFieldInput" name="newFieldName">
        </div>
        <div class="grid_2">
            <div class="form-group">
                <label for="region">Region Name</label>
                <select id="fieldRegionName" name="fieldRegionName" required>
                    <option value="">Select a Region</option>
                <!-- Country options will be populated by AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="block">Block Name</label>
                <select id="fieldBlockName" name="fieldBlockName" required>
                    <option value="">Select a Block</option>
                <!-- Country options will be populated by AJAX -->
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="siteSelect">Select Site</label>
        <select id="siteSelect" name="siteId" required>
            <option value="">Select a Site</option>
            <option value="addNewSite">Add New Site</option>
            <!-- Site options will be populated based on selected field -->
        </select>
        <!-- Hidden input for adding a new site -->
        <div id="newSiteDropdown" style="display: none;">
            <input type="text" id="newSiteInput" name="newSiteName">
        </div>
    </div>
    <div class="form-group">
        <label for="wellSelect">Select Well</label>
        <select id="wellSelect" name="wellId" required>
            <option value="">Select a Well</option>
            <option value="addNewWell">Add New Well</option>
            <!-- Well options will be populated based on selected site -->
        </select>
        <!-- Hidden input for adding a new well -->
        <div id="newWellDropdown" style="display: none;">
            <input type="text" id="newWellInput" name="newWellName">
        </div>
    </div>
    <div class="form-group">
        <label for="wellboreSelect">Select Wellbore</label>
        <select id="wellboreSelect" name="wellboreId" required>
            <option value="">Select a Wellbore</option>
            <option value="addNewWellbore">Add New Wellbore</option>
            <!-- Wellbore options will be populated based on selected well -->
        </select>
        <!-- Hidden input for adding a new wellbore -->
        <div id="newWellboreDropdown" style="display: none;">
            <input type="text" id="newWellboreInput" name="newWellboreName">
        </div>
    </div>
    <div class="form-group">
        <label for="reportName">Report Name</label>
        <input type="text" id="reportName" name="reportName" required>
    </div>
    <div class="form-group">
        <label for="unitTempSelect">Select Unit Template</label>
        <select id="unitTempSelect" name="unitTemplateId" >
            <option value="">Select a Unit Measurement Template</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Report</button>
    </div>
    <div id="responseMessage"></div>
</form>
