    <div class="wrapper">
    <h1 style="text-align: center;">Consumables</h1>
        <div class="row1">
            <div class="container">
                <h2>Land Rig Consumables Input</h2>
                <form action="process-report-header.php" method="post">
                    <div class="form-group">
                        <label for="diesel_rig">Diesel at Rig, Volume</label>
                        <input type="text" id="diesel_rig" name="diesel_rig" placeholder="Enter Diesel at Rig">
                    </div>
                    <div class="form-group">
                        <label for="diesel_camp">Diesel at Camp, Volume</label>
                        <input type="text" id="diesel_camp" name="diesel_camp" placeholder="Enter Diesel at Camp">
                    </div>
                    <div class="form-group">
                        <label for="gasoline">Gasoline, Volume</label>
                        <input type="text" id="gasoline" name="gasoline" placeholder="Enter Gasoline">
                    </div>
                    <div class="form-group">
                        <label for="IWater_rig">Industrial Water at Rig, Volume</label>
                        <input type="text" id="IWater_rig" name="IWater_rig" placeholder="Enter Industrial Water at Rig">
                    </div>
                    <div class="form-group">
                        <label for="IWater_camp">Industrial Water at Camp, Volume</label>
                        <input type="text" id="IWater_camp" name="IWater_camp" placeholder="Enter Industrial Water at Camp">
                    </div>
                    <div class="form-group">
                        <label for="PWater_rig">Portable Water at Rig, Volume</label>
                        <input type="text" id="PWater_rig" name="PWater_rig" placeholder="Enter Portable Water at Rig">
                    </div>
                    <div class="form-group">
                        <label for="PWater_camp">Portable Water at Camp, Volume</label>
                        <input type="text" id="PWater_camp" name="PWater_camp" placeholder="Enter Portable Water at Camp">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Offshore Rig Consumables Input</h2>
                <form>
                    <div class="form-group personnel-group">
                        <label for="fuel_board">Fuel On Board, Volume</label>
                        <input type="text" id="fuel_board" name="fuel_board" placeholder="Enter Fuel On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="PWater_board">Portable Water On Board, Volume</label>
                        <input type="text" id="PWater_board" name="PWater_board" placeholder="Enter Portable Water On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="DWater_board">Drilling Water On Board, Volume</label>
                        <input type="text" id="DWater_board" name="DWater_board" placeholder="Enter Drilling Water On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="Barite_board">Barite On Board, Weight</label>
                        <input type="text" id="Barite_board" name="Barite_board" placeholder="Enter Barite On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="Bentonite_board">Bentonite On Board, Weight</label>
                        <input type="text" id="Bentonite_board" name="Bentonite_board" placeholder="Enter Bentonite On Board">
                    </div>
                    <div class="form-group">
                        <label for="Cement_board">Cements On Board, Weight</label>
                        <input type="text" id="Cement_board" name="Cement_board" placeholder="Enter Cements On Board">
                    </div>
                </form>
            </div>
        </div>

        <div class="row1">
            <div class="container">
                <h3>Fluids Unit Of Measurement</h3>
                <div class="form-group radio-group">
                    <label><input type="radio" name="fluids" value="US_Galone"> US Galone</label>
                    <label><input type="radio" name="fluids" value="Bbls"> Bbls</label>
                    <label><input type="radio" name="fluids" value="Litres"> Litres</label>
                    <label><input type="radio" name="fluids" value="M3"> M<sup>3</sup></label>
                </div>
            </div>

            <div class="container">
                <h3>Cements</h3>
                <div class="form-group radio-group">
                    <label><input type="radio" name="cements" value="C_100lbsx"> Cmt 100 lb sx</label>
                    <label><input type="radio" name="cements" value="C_50KGsx"> Cmt 50 KG sx</label>
                    <label><input type="radio" name="cements" value="CuFt_sack"> Cu/Ft Sack</label>
                    <label><input type="radio" name="cements" value="C_M3"> M<sup>3</sup></label>
                    <label><input type="radio" name="cements" value="Tons"> Tons</label>
                </div>
            </div>
        </div>
    </div>