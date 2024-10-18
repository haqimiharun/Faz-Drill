<!-- HTML form for adding a new site -->
<form id="reportForm" action="" method="POST">
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
        <label for="wellboreSelect">Select Wellbore</label>
        <select id="wellboreSelect" name="wellboreId" required>
            <option value="">Select a Wellbore</option>
            <!-- Wellbore options will be populated based on selected country -->
        </select>
    </div>
    <div class="form-group">
        <label for="reportName">Report Name</label>
        <input type="text" id="reportName" name="reportName" required>
        <input type="hidden" id="wellboreIdHidden" name="wellboreId" />
        <input type="hidden" id="wellIdHidden" name="wellId" />
        <input type="hidden" id="siteIdHidden" name="siteId" />
        <input type="hidden" id="fieldIdHidden" name="fieldId" />
        <input type="hidden" id="countryIdHidden" name="countryId" />
    </div>
    <div class="form-group">
        <label for="unitTempSelect">Select Unit Template</label>
        <select id="unitTempSelect" name="unitTemplateId" required>
            <option value="">Select a Unit Measurement Template</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Report</button>
    </div>
    <div id="responseMessage"></div>
</form>
