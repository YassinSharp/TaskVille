<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Gig - Fiverr Clone</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Light Gray background */
            color: #333333; /* Dark Gray text color */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #007991; /* Teal Blue */
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form textarea {
            resize: vertical;
        }

        form button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007991; /* Teal Blue */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button[type="submit"]:hover {
            background-color: #005e66; /* Darker shade of Teal Blue for hover */
        }

    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Create Your Gig</h1>
            <p>Fill in the details below to create your gig</p>
        </div>
    </header>
    <div class="container">
        <?php
            if (isset($_POST["submit"])) {
                $email = $_POST["gigTitle"];
                $password = $_POST["gigDescription"];
                if ($email) {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }else{
                    echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            }
        ?>
        <!-- Gig creation form -->
        <form method="post">
            <label for="gigTitle">Gig Title:</label><br>
            <input type="text" id="gigTitle" name="gigTitle"><br><br>
            <label for="gigDescription">Gig Description:</label><br>
            <textarea id="gigDescription" name="gigDescription" rows="4"></textarea><br><br>
            <label for="gigPrice">Price:</label><br>
            <input type="text" id="gigPrice" name="gigPrice"><br><br>
            <label for="deliveryTime">Delivery Time:</label><br>
            <input type="text" id="deliveryTime" name="deliveryTime"><br><br>
            <button type="submit">Create Gig</button>
        </form>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 Fiverr Clone. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
