<?php
include "database.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Handle image upload
   
    $image = $_FILES['photo'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];

    // Directory where uploaded images will be stored
    $uploadDirectory = "uploads/";
    // Path to store the uploaded image
    $targetFilePath = $uploadDirectory . basename($imageName);

    // Move the uploaded file to the specified location
    if (move_uploaded_file($imageTmpName, $targetFilePath)) {
        // Prepare and execute the SQL query to insert data into the database
        $stmt = $connection->prepare("INSERT INTO gigs (gig_title, gig_description, gig_price, gig_image, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $description, $price, $targetFilePath, $status);
        if ($stmt->execute()) {
            echo "Gig posted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        // Close statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="underline-on-hover">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="body">
    <div class="container">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">
                                Title
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" id="title" name="title" value="" required>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">
                                Category
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="category" name="category" required>
                                    <option value="SS">Scripts &amp; Software</option>
                                    <option value="GD">Graphics &amp; Design</option>
                                    <option value="WM">Web Marketing</option>
                                    <option value="V">Videos</option>
                                    <option value="M">Music</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">
                                Description
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">
                                Price ($)
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" value="" required>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">
                                Image
                            </label>
                            <div class="col-sm-10">
                                <p>
                                    <input type="file" class="form-control" id="image" name="photo" required>
                                </p>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">
                                Status
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="">Disable</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Post Gig</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

</body>
<footer id="footer">
    <div class="container">
        <span><strong><a href="https://ph4marketplace.com">9RAYA24</a></strong> &copy; 2018</span>
    </div>
</footer>
</html>
