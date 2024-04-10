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
        #already-registered {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        #already-registered a {
            color: #337ab7;
            text-decoration: none;
        }
        #already-registered a:hover {
            text-decoration: underline;
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
                <a class="navbar-brand" href="index.html">
                    <img src="logo.png" height="23" alt="9RAYA24">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html" class="underline-on-hover">Home</a></li>
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
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="registration-form" novalidate>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="invalid-feedback">Please enter a username.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            <div class="invalid-feedback">Passwords do not match.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_type" class="col-sm-2 col-form-label">Register as:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_type" name="user_type" required>
                                <option value="">Select</option>
                                <option value="seller">Seller</option>
                                <option value="buyer">Buyer</option>
                            </select>
                            <div class="invalid-feedback">Please select your role.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </div>
                    <p id="already-registered">Already registered? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#registration-form').submit(function(event) {
            var form = $(this);
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.addClass('was-validated');

            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            if (password !== confirm_password) {
                $('#confirm_password')[0].setCustomValidity("Passwords do not match");
            } else {
                $('#confirm_password')[0].setCustomValidity('');
            }
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
