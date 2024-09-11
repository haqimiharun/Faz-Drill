<div class="wrapper">
    <div class="row1">
        <div class="container">
            <h2>Daily Cost</h2>
            <form action="process.php" method="POST">
                <div class="table-wrapper">
                    <table class="table-custom" id="inputTable">
                        <tbody>
                            <tr>                                
                                <th class="small-column"></th>
                                <th class="small-column">AFE</th>
                                <th class="small-column"></th>
                                <th class="small-column"><input type="date" id="date-time-LOT" name="date-time-LOT" placeholder="Enter Date and Time"></th>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                            </tr>
                            <tr>                                
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2" class="small-column">Road & Location</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_2" /></td>
                                 <th colspan="1"></th>
                            </tr>
                        
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Wellhead & Tubulars</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_8" /></td>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Drilling Rig</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_14" /></td>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="2">Services</th>
                                 <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="small-column"><button type="button" class="add-row" onclick="addRow(this)">+</button></th>
                                <th class="small-column"><input type="text" name="input_1_2" /></th>
                                <th></th>
                                <td><input type="text" name="input_1_14" /></td>
                                 <th colspan="1"></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
    <div class="centrelized">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
            </form>
        </div>
    </div>
</div>


