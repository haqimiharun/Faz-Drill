
<link rel="stylesheet" href="css/report_info/drlg-data.css">

<div class="wrapper-dd">
    <div class="container-dd">  
        <form>
            <h2>Drilling Data</h2>
            <div class="personnel-dd">
                <div class="form-group-dd personnel-group-dd">
                    <label class="dd-personnel" for="company">Depth MD</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="dd-personnel" for="contractor">Depth TVD</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">

                    <label class="dd-personnel" for="service_co">Depth Yesterday MD</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="dd-personnel" for="catering">Progress</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
                <div class="form-group-dd personnel-group-dd">
                    <label class="dd-personnel" for="company">Mug Weight</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="dd-personnel" for="contractor">Rotating Weight</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">

                    <label class="dd-personnel" for="service_co">Pick Up Weight</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="dd-personnel" for="catering">Slack Off Weight</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
                <div class="form-group-dd personnel-group-dd">
                    <label class="dd-personnel" for="company">Averange Drag</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="dd-personnel" for="contractor">Max Drag</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">

                    <label class="dd-personnel" for="service_co">Torque On Btm</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="dd-personnel" for="catering">Torque Off Btm</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
                <div class="form-group-dd personnel-group-dd">
                    <label class="dd-personnel" for="company">Jar Hours</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="dd-personnel" for="contractor">Rotating Hours</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">

                    <label class="dd-personnel" for="service_co">AV DP</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="dd-personnel" for="catering">AV HWDP</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
                <div class="form-group-dd personnel-group-dd">
                    <label class="dd-personnel" for="company">AV DC</label>
                    <input type="number" id="company" name="company" oninput="calculateTotal()" placeholder="Enter number of company">
                    
                    <label class="dd-personnel" for="contractor">Btms Up</label>
                    <input type="number" id="contractor" name="contractor" oninput="calculateTotal()" placeholder="Enter number of contractor">

                    <label class="dd-personnel" for="service_co">ECD</label>
                    <input type="number" id="service_co" name="service_co" oninput="calculateTotal()" placeholder="Enter number of service corporation">
                    
                    <label class="dd-personnel" for="catering">Jet Velocity</label>
                    <input type="number" id="catering" name="catering" oninput="calculateTotal()" placeholder="Enter number of catering">
                </div>
            </div>
            <!-- Well Location & Profile Section -->
            <div class="checkbox">
                <div class="form-group-dd radio-group">
                    <label for="company">BOP Drill</label>
                    <label><input type="radio" name="BOPDrill" value="1"> Yes</label>
                    <label><input type="radio" name="BOPDrill" value="0"> No</label>
                </div>
                <div class="form-group-dd radio-group">
                    <label for="company">Trip Drill</label>
                    <label><input type="radio" name="TripDrill" value="1"> Yes</label>
                    <label><input type="radio" name="TripDrill" value="0"> No</label>
                </div>
                <div class="form-group-dd radio-group">
                     <label for="company">Pollution</label>
                    <label><input type="radio" name="Pollution" value="1"> Yes</label>
                    <label><input type="radio" name="Pollution" value="0"> No</label>
                </div>
            </div>
        </form>
    </div>
</div>