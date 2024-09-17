
    <div class="wrapper">
        <div class="row1">
            <div class="container">
                <h2>Supervision</h2>
                <form action="process-report-header.php" method="post">
                <div class="form-group">
                        <label for="date-time">Date & Time</label>
                        <input type="datetime-local" id="date-time" name="date-time" placeholder="Enter Date and Time">
                    </div>
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
            <div class="form-group-rh">
                <label for="Next-Location">Next Location</label>
                <input type="text" id="Next-Locationer" name="Next-Location" placeholder="Enter Next Location">
            </div>
            <div class="form-group-rh">
                <label for="TD">Proposed TD, length</label>
                <input type="text" id="TD" name="TD" placeholder="Enter Proposed TD">
            </div>
            <div class="form-group-rh">
                <label for="AFE">AFE</label>
                <input type="text" id="AFE" name="AFE" placeholder="Enter AFE">
            </div>
            <div class="form-group-rh">
                <label for="Objective">Objective</label>
                <input type="text" id="Objective" name="Objective" placeholder="Enter Objective Name">
            </div>
            <div class="form-group-rh">
                <label for="Present">Present Operation</label>
                <input type="text" id="Present" name="Present" placeholder="Enter Present Operation">
            </div>
        </form>
    </div>

    <!-- Second Row (Personnel, Well Location & Profile, Daily and Accumulative Costs) -->
    <div class="container-rh2">
        <form>
            <h2>Personnel</h2>
            <div class="personnel">
                <div class="form-group-rh personnel-group">
                    <label class="rh-personnel" for="company">Company</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="rh-personnel" for="contractor">Contractor</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">
                </div>
                <div class="form-group-rh personnel-group">
                    <label class="rh-personnel" for="service_co">Service Co</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="rh-personnel" for="catering">Catering</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
                <div class="form-group-rh personnel-group">
                    <label class="rh-personnel" for="other">Others</label>
                    <input type="number" id="other" name="other" oninput="calculateTotal()" placeholder="Enter number of others">
                    
                    <label class="rh-personnel" for="total">Total</label>
                    <input type="number" id="total" name="total" readonly placeholder="0">
                </div>
            </div>
            <!-- Well Location & Profile Section -->
            <h2>Well Location & Profile</h2>
            <div class="form-group-rh radio-group">
                <label><input type="radio" name="location" value="On Shore"> On Shore</label>
                <label><input type="radio" name="location" value="Shallow Water"> Shallow Water</label>
                <label><input type="radio" name="location" value="Deep Water"> Deep Water</label>
            </div>
            <div class="form-group-rh">
                <label for="profile">Profile</label>
                <select id="profile" name="profile">
                    <option value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                </select>
            </div>

            <div class="container">
                <h2>Daily and Accumulative Costs</h2>
                <form>
                    <div class="form-group">
                        <label for="daily_cost">Daily Well Cost, $</label>
                        <input type="number" id="daily_cost" name="daily_cost" value="0">
                    </div>
                    <div class="form-group">
                        <label for="accum_cost">Accumulative Cost, $</label>
                        <input type="number" id="accum_cost" name="accum_cost" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>

