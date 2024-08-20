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
        <h1 style="text-align: center;">Survey Data</h1>
        <div class="row">
            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>#1</th>
                                    <th>#2</th>
                                    <th>#3</th>
                                    <th>#4</th>
                                    <th>#5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>MTD</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                    <td><input type="text" name="input_1_5" /></td>
                                </tr>
                                <tr>
                                    <th>TVD</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                    <td><input type="text" name="input_2_4" /></td>
                                    <td><input type="text" name="input_2_5" /></td>
                                </tr>
                                <tr>
                                    <th>Inch<sup>o</sup></th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                    <td><input type="text" name="input_3_5" /></td>
                                </tr>
                                <tr>
                                    <th>Azm<sup>o</sup></th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                    <td><input type="text" name="input_4_4" /></td>
                                    <td><input type="text" name="input_4_5" /></td>
                                </tr>
                                <tr>
                                    <th>N+ / S-</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                    <td><input type="text" name="input_4_4" /></td>
                                    <td><input type="text" name="input_4_5" /></td>
                                </tr>
                                <tr>
                                    <th>E+ / W-</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                    <td><input type="text" name="input_4_4" /></td>
                                    <td><input type="text" name="input_4_5" /></td>
                                </tr>
                                <tr>
                                    <th>V/S</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                    <td><input type="text" name="input_4_4" /></td>
                                    <td><input type="text" name="input_4_5" /></td>
                                </tr>
                                <tr>
                                    <th>DLS<sup>o</sup></th>
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
        </div>

        <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
    </div>

</body>
</html>
    <?php require_once('footer.php'); ?>