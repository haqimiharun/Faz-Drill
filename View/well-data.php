<link rel="stylesheet" href="css/report_info/well-data.css">

<div class="wrapper-wd">
    <div class="container-rh">
        <form action="#" method="post">
            <h2>Well Data Information</h2>
            <div class="form-row-wd">
                <div class="form-group-wd">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($company); ?>" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($country); ?>" readonly>
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
                    <select id="region" name="region">
                        <option value="" disabled selected>Select Region</option>
                        <?php foreach ($regions as $region): ?>
                            <option value="<?php echo htmlspecialchars($region['region_name']); ?>"><?php echo htmlspecialchars($region['region_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="block">Block</label>
                    <select id="block" name="block">
                        <option value="" disabled selected>Select Block</option>
                        <?php foreach ($blocks as $block): ?>
                            <option value="<?php echo htmlspecialchars($block['block_name']); ?>"><?php echo htmlspecialchars($block['block_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="field">Field</label>
                    <input type="text" id="field" name="field" value="<?php echo htmlspecialchars($field); ?>" readonly>
                </div>
                <div class="form-group-wd">
                    <label for="platform">Field/Platform</label>
                    <input type="text" id="platform" name="platform" placeholder="Enter Field/Platform">
                </div>
                <div class="form-group-wd">
                    <label for="rigName">Rig Name</label>
                    <select id="rigName" name="rigName">
                        <option value="" disabled selected>Select Rig Name</option>
                        <!-- Populate from Rig Name Library -->
                    </select>
                </div>
                <div class="form-group-wd">
                    <label for="waterDepth">Water Depth</label>
                    <input type="text" id="waterDepth" name="waterDepth" placeholder="Enter Water Depth"> <!-- User Input -->
                </div>
                <div class="form-group-wd">
                    <label for="depth">Depth</label>
                    <input type="text" id="depth" name="depth" placeholder="Enter Depth"> <!-- User Input -->
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
                    <label for="pcsbEng">PCSB Engineer</label>
                    <input type="text" id="pcsbEng" name="pcsbEng" placeholder="Enter PCSB Engineer"> <!-- User Input -->
                </div>
            </div>
        </form>
    </div>
</div>

<script src="Controller/reportInformation/well-data.js" defer></script>
