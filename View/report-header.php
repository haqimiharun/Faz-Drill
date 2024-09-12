
    <div class="wrapper">
        <div class="row1">
            <div class="container">
                <h2>Supervision</h2>
                <form action="process-report-header.php" method="post">
                <div class="form-group">
                        <label for="Well"> Well</label>
                        <input type="text" id="Well" name="Well" placeholder="Enter WellName">
                    </div>
                    <div class="form-group">
                        <label for="Lead-DSV">Lead DSV</label>
                        <input type="text" id="Lead-DSV" name="Lead-DSV" placeholder="Enter Lead DSV">
                    </div><div class="form-group">
                        <label for="-DSNightV">Night DSV</label>
                        <input type="text" id="Night-DSV" name="Night-DSV" placeholder="Enter Night DSV">
                    </div>
                    <div class="form-group">
                        <label for="engineer">Drilling Engineer/Company</label>
                        <input type="text" id="engineer" name="engineer" placeholder="Enter Engineer/Company Name">
                    </div>
                    <div class="form-group">
                        <label for="geologist">Well Site Geologist</label>
                        <input type="text" id="geologist" name="geologist" placeholder="Enter Geologist Name">
                    </div>
                    <div class="form-group">
                        <label for="rep">Government Representative on Site</label>
                        <input type="text" id="rep" name="rep" placeholder="Enter Representative Name">
                    </div>
                    <div class="form-group">
                        <label for="toolpusher">Tool Pusher</label>
                        <input type="text" id="toolpusher" name="toolpusher" placeholder="Enter Tool Pusher Name">
                    </div>
                    <div class="form-group">
                        <label for="Contactor">Contractor</label>
                        <input type="text" id="Contractor" name="Contractor" placeholder="Enter Contractor Name">
                    </div>
                </form>
            </div>
            <div class="container">
                <h2>Report Header</Header></h2>
                <form action="process-report-header.php" method="post">
                <div class="form-group">
                        <label for="Location"> Location</label>
                        <input type="text" id="Location" name="Location" placeholder="Enter Current Location ">
                    </div>
                    <div class="form-group">
                        <label for="Next-Location">Next Location</label>
                        <input type="text" id="Next-Locationer" name="Next-Location" placeholder="Enter Next-Location">
                    </div>
                    <div class="form-group">
                        <label for="TD">Proposed TD, length</label>
                        <input type="text" id="TD" name="TD" placeholder="Enter Proposed TD">
                    </div>
                    <div class="form-group">
                        <label for="AFE"> AFE</label>
                        <input type="text" id="AFE" name="AFE" placeholder="Enter AFE">
                    </div>
                    <div class="form-group">
                        <label for="Objective">Objective</label>
                        <input type="text" id="Objective" name="Objective" placeholder="Enter Objective Name">
                    </div>
                    <div class="form-group">
                        <label for="Present">Present Operation</label>
                        <input type="text" id="Present" name="Present" placeholder="Enter Present Operation">
                    </div>
                    <div class="form-group">
                        <label for="Spud-Data">Spud Data</label>
                        <input type="date" id="Spud-Data" name="Spud-Data" placeholder="Enter Date and Time">
                    </div>
                    <div class="form-group">
                        <label for="Last-Casing">Last Casing</label>
                        <input type="text" id="Last-Casing" name="Last-Casing" placeholder="Enter Last Casing">
                    </div>
                    <div class="form-group">
                        <label for="Next-Casing">Next Casing</label>
                        <input type="text" id="Next-Casing" name="Next-Casing" placeholder="Enter Next Casing">
                    </div>
                    <div class="form-group">
                        <label for="LOF-Mudden">Leakoff Mud Density</label>
                        <input type="text" id="LOF-Mudden" name="LOF-Mudden" placeholder="Enter Leakoff Mud Density">
                    </div>
                    <div class="form-group">
                        <label for="Last-BOP">Last BOP Test</label>
                        <input type="date" id="Last-BOP" name="Last-BOP" placeholder="Enter Last BOP Test">
                    </div>
                    <div class="form-group">
                        <label for="Repairs">RD/Repairs Last 24 Hrs</label>
                        <input type="text" id="Repairs" name="Repairs" placeholder="Enter RD/Repairs Last 24 Hrs">
                    </div>
                    <div class="form-group">
                        <label for="Est-AFECost">Est AFE Cost, $</label>
                        <input type="text" id="Est-AFECost" name="Est-AFECost" placeholder="Enter Est AFE Cost">
                    </div>
                    <div class="form-group">
                        <label for="LostTime">Lost Time Accidents</label>
                        <input type="date" id="LostTime" name="LostTime" placeholder="Enter Lost Time Accidents">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Personnel</h2>
                <form>
                    <div class="form-group personnel-group">
                        <label for="company">Company</label>
                        <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="contractor">Contractor</label>
                        <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="service_co">Service Corporation</label>
                        <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="catering">Catering</label>
                        <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="other">Others</label>
                        <input type="number" id="other" name="other" oninput="calculateTotal()" placeholder="Enter number of others">
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" id="total" name="total" readonly placeholder="0">
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row1">
            <div class="container">
                <h2>Well Location & Profile</h2>
                <form>
                    <div class="form-group radio-group">
                        <label><input type="radio" name="location" value="On Shore"> On Shore</label>
                        <label><input type="radio" name="location" value="Shallow Water"> Shallow Water</label>
                        <label><input type="radio" name="location" value="Deep Water"> Deep Water</label>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select id="profile" name="profile">
                            <option value="Vertical">Vertical</option>
                            <option value="Horizontal">Horizontal</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Daily and Accumulative Costs</h2>
                <form>
                    <div class="form-group">
                        <label for="daily_cost">Daily Well Cost</label>
                        <input type="number" id="daily_cost" name="daily_cost" value="0">
                    </div>
                    <div class="form-group">
                        <label for="accum_cost">Accumulative Cost</label>
                        <input type="number" id="accum_cost" name="accum_cost" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculateTotal() {
            const company = parseInt(document.getElementById('company').value) || 0;
            const contractor = parseInt(document.getElementById('contractor').value) || 0;
            const serviceCo = parseInt(document.getElementById('service_co').value) || 0;
            const catering = parseInt(document.getElementById('catering').value) || 0;
            const other = parseInt(document.getElementById('other').value) || 0;
            const total = company + contractor + serviceCo + catering + other;
            document.getElementById('total').value = total;
        }
    </script>
