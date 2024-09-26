<link rel="stylesheet" href="css/report_info/well-data.css">

<div class="wrapper-wd">
    <div class="container-rh">
        <form action="#" method="post">
            <h2>Well Data Information</h2>
            <div class="form-row-wd">
                <div class="form-group-wd">
                    <label for="wellInfo">Well Info</label>
                    <select id="wellInfo" name="wellInfo">
                        <option value="" disabled selected>Select Well Info</option>
                        <!-- Options here -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="eventDesc">Event Description</label>
                    <select id="eventDesc" name="eventDesc">
                        <option value="" disabled selected>Select Event</option>
                        <!-- Options here -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="waterDepth">Water Depth</label>
                    <input type="text" id="waterDepth" name="waterDepth" placeholder="Enter Water Depth">
                </div>
                <div class="form-group-wd">
                    <label for="depth">Depth</label>
                    <input type="text" id="depth" name="depth" placeholder="Enter Depth">
                </div>
                <div class="form-group-wd">
                    <label for="region">Region</label>
                    <select id="region" name="region">
                        <option value="" disabled selected>Select Region</option>
                        <!-- Options here -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="rigName">Rig Name</label>
                    <select id="rigName" name="rigName" disabled>
                        <option value="auto">Auto Selected Rig Name</option>
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="objective">Objective</label>
                    <input type="text" id="objective" name="objective" placeholder="Enter Objective">
                </div>
                <div class="form-group-wd">
                    <label for="platform">Field/Platform</label>
                    <select id="platform" name="platform">
                        <option value="" disabled selected>Select Field/Platform</option>
                        <!-- Options here -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="afeNo">AFE No</label>
                    <input type="text" id="afeNo" name="afeNo" placeholder="Enter AFE No">
                </div>
                <div class="form-group-wd">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" name="startDate">
                </div>
                <div class="form-group-wd">
                    <label for="spudDate">Spud Date</label>
                    <input type="date" id="spudDate" name="spudDate">
                </div>
                <div class="form-group-wd">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" name="endDate">
                </div>
                <div class="form-group-wd">
                    <label for="block">Block</label>
                    <input type="text" id="block" name="block" placeholder="Enter Block">
                </div>
                <div class="form-group-wd">
                    <label for="leadDS">Lead DS</label>
                    <input type="text" id="leadDS" name="leadDS" placeholder="Enter Lead DS">
                </div>
                <div class="form-group-wd">
                    <label for="nightDS">Night DS</label>
                    <input type="text" id="nightDS" name="nightDS" placeholder="Enter Night DS">
                </div>
                <div class="form-group-wd">
                    <label for="pcsbEng">PCSB Engineer</label>
                    <input type="text" id="pcsbEng" name="pcsbEng" placeholder="Enter PCSB Engineer">
                </div>
            </div>
        </form>
    </div>
</div>