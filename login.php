<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");

$csrf = new CSRF_Protect();
$error_message = '';

if (isset($_POST['form1'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email and/or Password cannot be empty<br>';
    } else {
        // Sanitize user input
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Prepare statement to fetch user from the database
        $statement = $pdo->prepare("SELECT * FROM tbl_user WHERE email=? AND status=?");
        $statement->execute(array($email, 'Active'));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Verify password with MD5
            if (md5($password) === $result['password']) { // MD5 password check
                $_SESSION['user'] = $result; // Store user details in session
                header("location: index.php");
                exit();
            } else {
                $error_message .= 'Password does not match<br>';
            }
        } else {
            $error_message .= 'Email Address does not match<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/datepicker3.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        body {
            background-color: #080d30 !important;
            color: #ffffff;
        }
        .login-box {
            width: 360px;
            margin: 7% auto;
        }
        .login-logo b {
            color: #05aff7;
            font-size: 46px;
        }
        .login-box-body {
            background-color: #86c237;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .login-box-msg { /* "log in fazdrill to start" */
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            border-color: #ffffff;
        }
        .form-control {
            background-color: #080d30;
            border: 1px solid #05aff7;
            color: #ffffff;
        }
        .btn-success {
            background-color: #05aff7;
            border-color: #86c237;
        }
        .btn-success:hover {
            background-color: #05aff7;
            border-color: #05aff7;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
    <div class="login-logo">
    <img src="img/faz-drill-logo1.png" alt="Faz Drill Logo" width="200" height="230">
    <br>

</div>
    <div class="login-box-body">
        <p class="login-box-msg">Log in to start your session</p>

        <?php 
        if(isset($error_message) && $error_message != ''):
            echo '<div class="error">'.$error_message.'</div>';
        endif;
        ?>

        <form action="" method="post">
            <?php $csrf->echoInputField(); ?>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
            </div>
            <div>
                <input type="submit" class="btn btn-success btn-block btn-flat login-button" name="form1" value="Log In">
            </div>
        </form>
    </div>
</div>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/jquery.inputmask.js"></script>
<script src="js/jquery.inputmask.date.extensions.js"></script>
<script src="js/jquery.inputmask.extensions.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/icheck.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/app.min.js"></script>
<script src="js/demo.js"></script>

</body>
</html>

