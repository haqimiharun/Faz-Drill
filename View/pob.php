    <div class="wrapper">
        <div class="row1">
            <div class="container">
                <h2>Personnel On Board</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                    <form action="process.php" method="POST">
                        <div class="table-wrapper">
                            <table class="table-custom" id="inputTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Occupation</th>
                                        <th>Company Name</th>
                                        <th>Company No.</th>
                                        <th>Arrival Date</th>
                                        <th>Day On Rig</th>
                                        <th>Exit Date</th>
                                        <th>Cabin/Bunk</th>
                                        <th>Lifeboat</th>
                                        <th>Emergency Member</th>
                                        <th>Category</th>
                                        <th>Shift</th>
                                        <th>Crew</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start with one row -->
                                    <tr>
                                        <td>
                                            <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                        </td>
                                        <td><input type="text" name="input_1_1" /></td>
                                        <td><input type="text" name="input_1_2" /></td>
                                        <td><input type="text" name="input_1_3" /></td>
                                        <td><input type="text" name="input_1_4" /></td>
                                        <td><input type="text" name="input_1_5" /></td>
                                        <td><input type="text" name="input_1_6" /></td>
                                        <td><input type="text" id="dayOnRig_1" name="input_1_7" /></td>
                                        <td><input type="text" name="input_1_8" /></td>
                                        <td><input type="text" name="input_1_9" /></td>
                                        <td><input type="text" name="input_1_10" /></td>
                                        <td><input type="text" name="input_1_11" /></td>
                                        <td><input type="text" name="input_1_12" /></td>
                                        <td><input type="text" name="input_1_13" /></td>
                                        <td><input type="text" name="input_1_14" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>
            </div>
        </div>
    </div>
