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
    <ul class="nav nav-tabs" id="wellSettingsTabs">
        <li class="nav-item">
            <a class="nav-link active" href="#locationTab" data-toggle="tab">Location</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#uncertaintyTab" data-toggle="tab">Uncertainty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#templateTab" data-toggle="tab">Template</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-2">
        <!-- Location Tab -->
        <div class="tab-pane fade show active" id="locationTab">
            <div class="form-group1">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" class="form-control" required>
            </div>
            <div class="form-group1">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" class="form-control" required>
            </div>
        </div>

        <!-- Uncertainty Tab -->
        <div class="tab-pane fade" id="uncertaintyTab">
            <div class="form-grou1p">
                <label for="uncertaintyValue">Uncertainty Value</label>
                <input type="text" id="uncertaintyValue" name="uncertaintyValue" class="form-control" required>
            </div>
        </div>

        <!-- Template Tab -->
        <div class="tab-pane fade" id="templateTab">
            <div class="form-group1">
                <label for="template">Template</label>
                <input type="text" id="template" name="template" class="form-control" required>
            </div>
        </div>
    </div>

    <hr>
    
    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Add Well</button>
    </div>
    
    <div id="responseMessage"></div>
</form>

<!-- Add necessary Bootstrap/JS dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>