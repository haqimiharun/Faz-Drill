<link rel="stylesheet" href="css/report_info/depth-days.css">

<div class="wrapper-dd">
    <div class="container-dd">
        <form>
            <h2>Operation Summary</h2>

            <div class="form-group-ddOperation">
                <!-- From - To -->
                <label for="From-To">From - To:</label>
                <input type="text" id="From-To" name="From-To" required>
            </div>

            <div class="form-group-ddOperation">
                <!-- Hrs -->
                <label for="Hrs">Hrs:</label>
                <input type="text" id="Hrs" name="Hrs" disabled>
            </div>

            <div class="form-group-ddOperation">
                <!-- Phase Code -->
                <label for="Phase-Code">Phase Code:</label>
                <select id="Phase-Code" name="Phase-Code" required>
                    <option value="">Select Phase Code</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group-ddOperation">
                <!-- Activity Code -->
                <label for="Activity-Code">Activity Code:</label>
                <select id="Activity-Code" name="Activity-Code" required>
                    <option value="">Select Activity Code</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group-ddOperation">
                <!-- Productive/Non-Productive Code -->
                <label for="Productive-Code">Productive/Non-Productive Code:</label>
                <select id="Productive-Code" name="Productive-Code" required>
                    <option value="">Select Code</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group-ddOperation">
                <!-- NPT -->
                <label for="NPT">NPT:</label>
                <select id="NPT" name="NPT" required>
                    <option value="">Select NPT</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group-ddOperation">
                <!-- Rig Status -->
                <label for="Rig-Status">Rig Status:</label>
                <select id="Rig-Status" name="Rig-Status" required>
                    <option value="">Select Rig Status</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="form-group-ddOperation">
                <!-- MD from (m) -->
                <label for="MD-from">MD from (m):</label>
                <input type="text" id="MD-from" name="MD-from" required>
            </div>

            <div class="form-group-ddOperation">
                <!-- Operation -->
                <label for="Operation">Operation:</label>
                <textarea id="Operation" name="Operation" rows="4" required></textarea>
            </div>
        </form>
    </div>
</div>
