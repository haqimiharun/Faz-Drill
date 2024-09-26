<link rel="stylesheet" href="css/report_info/depth-days.css">

<div class="wrapper-dd">
    <div class="container-dd">
        <form>
            <h2>Depth Days Information</h2>
            <div class="form-group-dd">
                <!-- DOL -->
                <label for="DOL">DOL (Days):</label>
                <input type="text" id="DOL" name="DOL" placeholder="Enter DOL (Days)" required>

                <!-- DFS -->
                <label for="DFS">DFS (Days):</label>
                <input type="text" id="DFS" name="DFS" placeholder="Enter DFS (Days)" required>

                <!-- Total Days -->
                <label for="Total-Days">Total Days:</label>
                <input type="text" id="Total-Days" name="Total-Days" placeholder="Enter Total Days" required>

                <!-- Est Days -->
                <label for="Est-Days">Est Days:</label>
                <input type="text" id="Est-Days" name="Est-Days" placeholder="Enter Est Days" required>

                <!-- MD -->
                <label for="MD">MD (Depth):</label>
                <input type="text" id="MD" name="MD" placeholder="Enter MD (Depth)" required>

                <!-- TVD -->
                <label for="TVD">TVD (Depth):</label>
                <input type="text" id="TVD" name="TVD" placeholder="Enter TVD (Depth)" required>

                <!-- Progress -->
                <label for="Progress">Progress (Depth):</label>
                <input type="text" id="Progress" name="Progress" placeholder="Enter Progress (Depth)" required>

                <!-- Final TMD -->
                <label for="Final-TMD">Final TMD:</label>
                <input type="text" id="Final-TMD" name="Final-TMD" placeholder="Enter Final TMD" required>

                <!-- Daily NPT -->
                <label for="Daily-NPT">Daily NPT (Hours):</label>
                <input type="text" id="Daily-NPT" name="Daily-NPT" placeholder="Enter Daily NPT (Hours)" required>

                <!-- Cumm NPT -->
                <label for="Cumm-NPT">Cumm NPT (Hours):</label>
                <input type="text" id="Cumm-NPT" name="Cumm-NPT" placeholder="Enter Cumm NPT (Hours)" required>

                <!-- Rotating Hrs -->
                <label for="Rotating-Hrs">Rotating Hrs (Hours):</label>
                <input type="text" id="Rotating-Hrs" name="Rotating-Hrs" placeholder="Enter Rotating Hrs (Hours)" required>

                <!-- Cum Rot Hrs -->
                <label for="Cum-Rot-Hrs">Cum Rot Hrs (Hours):</label>
                <input type="text" id="Cum-Rot-Hrs" name="Cum-Rot-Hrs" placeholder="Enter Cum Rot Hrs (Hours)" required>

                <!-- Avg ROP -->
                <label for="Avg-ROP">Avg ROP (ROP Unit):</label>
                <input type="text" id="Avg-ROP" name="Avg-ROP" placeholder="Enter Avg ROP (ROP Unit)" required>

                <!-- Last Casing -->
                <label for="Last-Casing">Last Casing (in):</label>
                <input type="text" id="Last-Casing" name="Last-Casing" placeholder="Enter Last Casing Size" required>

                <!-- Last Hole Size -->
                <label for="Last-Hole-Size">Last Hole Size (in):</label>
                <input type="text" id="Last-Hole-Size" name="Last-Hole-Size" placeholder="Enter Last Hole Size" required>

                <!-- Last Shoe TMD -->
                <label for="Last-Shoe-TMD">Last Shoe TMD:</label>
                <input type="text" id="Last-Shoe-TMD" name="Last-Shoe-TMD" placeholder="Enter Last Shoe TMD" required>

                <!-- Last Shoe TVD -->
                <label for="Last-Shoe-TVD">Last Shoe TVD:</label>
                <input type="text" id="Last-Shoe-TVD" name="Last-Shoe-TVD" placeholder="Enter Last Shoe TVD" required>

                <!-- Current Hole Size -->
                <label for="Current-Hole-Size">Current Hole Size (in):</label>
                <input type="text" id="Current-Hole-Size" name="Current-Hole-Size" placeholder="Enter Current Hole Size" required>
            </div>

            <h2>Cost Information</h2>
            <div class="form-group-ddCost">
                <!-- Daily Cost -->
                <label for="dailyCost">Daily Cost ($):</label>
                <input type="text" id="dailyCost" name="dailyCost">

                <!-- Cumm Cost -->
                <label for="cummCost">Cumm Cost ($):</label>
                <input type="text" id="cummCost" name="cummCost">

                <!-- AFE Cost -->
                <label for="afeCost">AFE Cost ($):</label>
                <input type="text" id="afeCost" name="afeCost">

                <!-- Supp Cost / Days -->
                <label for="suppCostDays">Supp Cost / Days ($):</label>
                <input type="text" id="suppCostDays" name="suppCostDays">

                <!-- Expenditure -->
                <label for="expenditure">Expenditure (%):</label>
                <input type="text" id="expenditure" name="expenditure">
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="css/report_info/depth-days.css">

<div class="wrapper-dd">
    <div class="container-dd">
        <form>
            <h2>Status</h2>

            <div class="form-group-status">
                <!-- Current Status -->
                <label for="Current-Status">Current Status:</label>
                <textarea id="Current-Status" name="Current-Status" rows="3" required></textarea>
            </div>

            <div class="form-group-status">
                <!-- 24 Hr Summary -->
                <label for="24-Hr-Summary">24 Hr Summary:</label>
                <textarea id="24-Hr-Summary" name="24-Hr-Summary" rows="3" required></textarea>
            </div>

            <div class="form-group-status">
                <!-- 24 Hr Forecast -->
                <label for="24-Hr-Forecast">24 Hr Forecast:</label>
                <textarea id="24-Hr-Forecast" name="24-Hr-Forecast" rows="3" required></textarea>
            </div>

            <div class="form-group-status">
                <!-- Incident/Accident -->
                <label for="Incident-Accident">Incident/Accident:</label>
                <textarea id="Incident-Accident" name="Incident-Accident" rows="3" required></textarea>
            </div>

            <div class="form-group-status">
                <!-- Remarks -->
                <label for="Remarks">Remarks:</label>
                <textarea id="Remarks" name="Remarks" rows="3" required></textarea>
            </div>
        </form>
    </div>
</div>

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
