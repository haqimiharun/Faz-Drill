<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well Info Input</title>

</head>
<body>
    <div class="wrapper">
        <h1 style="text-align: center;">Pipe Data</h1>
        <div class="row1">
            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th></th>
                                    <th>Connection</th>
                                    <th>Outside Diameter (OD)</th>
                                    <th>Inside Diameter (ID)</th>
                                    <th>Weight</th>
                                    <th>Length</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Drill Pipe 1</th>
                                    <th>Top</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                    <td><input type="text" name="input_1_5" /></td>
                                </tr>
                                <tr>
                                    <th>Drill Pipe 2</th>
                                    <th>Middle</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                    <td><input type="text" name="input_2_4" /></td>
                                    <td><input type="text" name="input_2_5" /></td>
                                </tr>
                                <tr>
                                    <th>Drill Pipe 3</th>
                                    <th>Bottom</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                    <td><input type="text" name="input_3_5" /></td>
                                </tr>
                                <tr>
                                    <th>Drill Pipe 4</th>
                                    <th>Bottom</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                    <td><input type="text" name="input_4_4" /></td>
                                    <td><input type="text" name="input_4_5" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th></th>
                                    <th>Connection</th>
                                    <th>Outside Diameter (OD)</th>
                                    <th>Inside Diameter (ID)</th>
                                    <th>Weight</th>
                                    <th>Length</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Heavy Wt</th>
                                    <th>Top</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                    <td><input type="text" name="input_1_5" /></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Middle</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                    <td><input type="text" name="input_2_4" /></td>
                                    <td><input type="text" name="input_2_5" /></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Bottom</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                    <td><input type="text" name="input_3_5" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
    </div>

</body>
</html>
    <?php require_once('footer.php'); ?>