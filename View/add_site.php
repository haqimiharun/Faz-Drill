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
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Site</button>
    </div>
    <div id="responseMessage"></div>
</form>
