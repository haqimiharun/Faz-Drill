<form id="editFieldForm" action="" method="POST">
    <div class="form-group">
        <label for="countrySelect">Select Country</label>
        <select id="countrySelect" name="countryId" required>
            <option value="">Select a Country</option>
            <!-- Country options will be populated by AJAX -->
        </select>
    </div>
    <div class="form-group">
        <label for="fieldName">Field Name</label>
        <input type="text" id="fieldName" name="fieldName" required>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary" id="submitEditButton">Update Field</button> <!-- Default to Add Field -->
    </div>
    <div id="responseMessage"></div>
</form>
