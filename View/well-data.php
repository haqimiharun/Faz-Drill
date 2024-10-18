<link rel="stylesheet" href="css/report_info/well-data.css">

<div class="wrapper-wd">
    <div class="container-rh">
        <form class="well-data-form" action="#" method="post">
            <h2>Well Data Information</h2>
            <div class="form-row-wd">
                <div class="form-group-wd">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="eventDesc">Event Description</label>
                    <select id="eventDesc" name="eventDesc">
                        <option value="" disabled selected>Select Event</option>
                        <!-- Populate options from Lib_eventDesc -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="region">Region</label>
                    <input type="text" id="region" name="region" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="block">Block</label>
                    <input type="text" id="block" name="block" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="field">Field</label>
                    <input type="text" id="field" name="field" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="platform">Platform</label>
                    <input type="text" id="platform" name="platform" placeholder="Enter Platform"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="rigName">Rig Name</label>
                    <select id="rigName" name="rigName" >
                        <option value="" disabled selected>Select Rig Name</option>
                        <!-- Populate from Rig Name Library -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="waterDepth">Water Depth</label>
                    <input type="text" id="waterDepth" name="waterDepth" placeholder="Enter Water Depth"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="objective">Objective</label>
                    <input type="text" id="objective" name="objective" placeholder="Enter Objective"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="afeNo">AFE No</label>
                    <input type="text" id="afeNo" name="afeNo" placeholder="Enter AFE No"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" name="startDate"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="spudDate">Spud Date</label>
                    <input type="date" id="spudDate" name="spudDate"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" name="endDate"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="leadDS">Lead DS</label>
                    <input type="text" id="leadDS" name="leadDS" placeholder="Enter Lead DS"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="nightDS">Night DS</label>
                    <input type="text" id="nightDS" name="nightDS" placeholder="Enter Night DS"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="pcsbEng">Engineer</label>
                    <input type="text" id="pcsbEng" name="pcsbEng" placeholder="Enter Engineer"> <!-- User Input -->
                </div>
            </div>
             <!-- Buttons Section -->
            <div class="button-area">
                <button type="button" id="WDsaveButton">Save</button>
                <button type="submit" id="WDsubmitButton">Submit</button>
                <button type="button" id="WDclearButton">Clear</button>
                <button type="button" id="WDnextButton">Next</button>
            </div>
        </form>
    </div>
</div>

<script src="Controller/reportInformation/well-data.js" defer></script>
