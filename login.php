<?php
    include "database.php";
    if (isset($_POST["submit"])){
        $email = $_POST["login_email"];
        $password = $_POST["login_password"];

        $sql = "SELECT * FROM login_info WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            echo "Login successful!";
            session_start(); // Start the session
            if(is_array($row) && !empty($row)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
            }
        } else {
            // Authentication failed
            echo "Invalid email or password!";
        }
    }
    if (isset($_SESSION["email"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9RAYA24</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .invalid-feedback {
            display: none;
            color: red;
        }
        .was-validated input:invalid + .invalid-feedback,
        .was-validated select:invalid + .invalid-feedback {
            display: block;
        }
         /* Custom CSS for login form */
         #login-form .panel-heading {
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }
        #login-form .panel-title {
            color: #333;
            font-size: 20px;
            margin-top: 0;
        }
        #login-form .panel-body {
            padding: 20px;
        }
        #login-form .form-group {
            margin: 20px;
        }
        #login-form label {
            font-weight: bold;
        }
        #login-form input[type="email"],
        #login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        #login-form .btn-success {
            width: 100%;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .alert{
            margin: 20px;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="logo.png" height="23" alt="9RAYA24">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" class="underline-on-hover">Home</a></li>
                    <li><a href="#" class="underline-on-hover">About</a></li>
                    <li><a href="#" class="underline-on-hover">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle underline-on-hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/category/scripts-software">Scripts & Software</a></li>
                            <li><a href="/category/graphics-design">Graphics & Design</a></li>
                            <li><a href="/category/web-marketing">Web Marketing</a></li>
                            <li><a href="/category/videos">Videos</a></li>
                            <li><a href="/category/music">Music & Sounds</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="#" method="get" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" name="title" class="form-control" placeholder="Find services">
                            <span class="input-group-btn">
                                <button class="btn btn-success">Find</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>

<div id="body">
    <div class="container">
        <!-- Login Form -->
        <div class="panel panel-default" id="login-form">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form class="needs-validation" method="POST" novalidate>
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="email" class="form-control" id="login_email" name="login_email" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" id="login_password" name="login_password" required>
                        <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" name="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle form validation
    $(document).ready(function() {
        $('form.needs-validation').submit(function(event) {
            var form = $(this);
            if (!form[0].checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                $('.alert').alert('close'); // Close any existing alerts
                var alertHTML = '<div class="alert alert-danger alert-dismissible" role="alert"">Please fill out all required fields correctly.</div>';
                $(alertHTML).insertBefore(form);
            }
            form.addClass('was-validated');
        });
    });
</script>

</body>
<footer id="footer">
    <div class="container">
        <span><strong><a href="https://ph4marketplace.com">9RAYA24</a></strong> &copy; 2018</span>
    </div>
</footer>

</html>
