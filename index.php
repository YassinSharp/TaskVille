<?php
    include "database.php";
    session_start(); // Start the session
    if (isset($_SESSION["email"])){
        $current_user = $_SESSION['email'];
        echo "THE SESSION IS STARTED";
    } else {
        $current_user = "";
        echo "FUCK YOU I HATE YOU";
    }

    $received_value = "";
    $state = "";
    if ($current_user == "") {
        $state = "deactivate";
        $received_value .= "<a href='register.php' class='underline-on-hover'>Sign Up</a>"; // Use .= to concatenate strings
    } else {
        $state = "active";
        $received_value .= "<a href='#' class='underline-on-hover'>$current_user</a>"; // Use .= to concatenate strings
    }

?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    received_value_php = "<?php echo $state; ?>";
    var registerParent = document.getElementById('registerParent');
    if(received_value_php == "deactivate")
    {
        var anchorElement = document.createElement('a');
        anchorElement.setAttribute('href', 'register.php');
        anchorElement.classList.add('underline-on-hover');
        
        anchorElement.innerHTML = "<?php echo $received_value; ?>";

        registerParent.appendChild(anchorElement);
    }
    else{ 
        // Check if registerParent exists
        if (registerParent) {
            // Create a new div element for dropdown container
            var dropdownContainer = document.createElement('div');
            dropdownContainer.classList.add('dropdown');

            // Create a button element for triggering the dropdown
            var dropdownButton = document.createElement('button');
            dropdownButton.classList.add('dropdown-toggle', 'underline-on-hover', 'profile');
            dropdownButton.setAttribute('type', 'button');
            dropdownButton.setAttribute('data-toggle', 'dropdown');
            dropdownButton.innerHTML = "<?php echo $received_value; ?>";
            // Create a span element for the caret
            var caretSpan = document.createElement('span');
            caretSpan.classList.add('caret');
            
            // Append the caret to the button
            dropdownButton.appendChild(caretSpan);

            // Create a ul element for dropdown menu
            var dropdownMenu = document.createElement('ul');
            dropdownMenu.classList.add('dropdown-menu');

            // Create list items for dropdown options
            var categories = ["Profile", "Log out"];
            categories.forEach(function(category) {
                var listItem = document.createElement('li');
                var anchor = document.createElement('a');
                anchor.classList.add('dropdown-item');
                anchor.classList.add('underline-on-hover');
                anchor.setAttribute('href', category.toLowerCase().replace(/ /g, '')+ ".php");
                anchor.textContent = category;
                listItem.appendChild(anchor);
                dropdownMenu.appendChild(listItem);
            });

            // Append dropdown button and menu to the dropdown container
            dropdownContainer.appendChild(dropdownButton);
            dropdownContainer.appendChild(dropdownMenu);

            // Append the dropdown container to the parent
            registerParent.appendChild(dropdownContainer);
        }
    }
});


</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9RAYA24</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="mainStyles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .profile{
            padding: 15px;
            border: none;
            background-color: transparent;
            color: #333;
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
                <ul class="nav navbar-nav navbar-right">
                    <li id="registerParent" class="dropdown">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="body">
    <div class="container">
        <div class="banner-container">
            <img src="banner.jpeg" alt="Gig - pH4Marketplace" class="banner" role="banner">
            <div class="banner-text">
                <?php 
                    if($current_user == "")
                        echo "<h2>Welcome to 9RAYA24!</h2>";
                    else
                        echo "<h2>Welcome back, $current_user!</h2>";
                ?>
                <p>Find the best services for your needs.</p>
            </div>
        </div>
        <hr>
        <h3>Popular Services</h3>
        <div class="row">
        <?php
            $sql = "SELECT gig_title, gig_description, gig_price, gig_image FROM gigs WHERE status = '1'";
            $result = $connection->query($sql);
            
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Output HTML for each gig
                    echo "<div class='col-md-4'>";
                    echo "<div class='gig'>";
                    echo "<img class='imgZoom' src='" . $row['gig_image'] . "' alt='Uploaded Image'>";
                    echo "<div class='overlay'>";
                    // Output title
                    echo "<h3>" . $row['gig_title'] . "</h3>";
                    // Output description
                    echo "<p>" . $row['gig_description'] . "</p>";
                    // Output price
                    echo "<p>Price: $" . $row['gig_price'] . "</p>";
                    echo "<a href='#' class='btn btn-primary'>Order Now</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No active gigs found.";
            }
            $connection->close();
        ?>
            </div>
        </div>
    </div>
    <div class="text-center">
        <!-- Button to post a gig -->
        <?php
            echo '<a href="post_gig.php" class="btn btn-primary">Post a Gig</a>';
        ?>
    </div>
</body>
<footer id="footer">
    <div class="container">
        <span><strong><a href="https://ph4marketplace.com">9RAYA24</a></strong> &copy; 2018</span>
    </div>
</footer>

</html>
