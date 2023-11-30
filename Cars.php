<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <style>
        /* Your existing CSS styles remain unchanged */

        /* Additional style for the new buttons */
        button.signup-button {
            padding: 10px;
            background-color: #555;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px; /* Add some space between the search form and the button */
        }

        button.new-user-button {
            padding: 10px;
            background-color: #4CAF50; /* Green color */
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px; /* Add some space between the buttons */
            margin-left: 10px; /* Add some space between the buttons */
        }
    </style>
</head>

<body>
    <header>
        <h1>Car Listings</h1>
        <a href="signup.php" class="signup-button">Sign Up</a>
    </header>

    <div class="container">
        <a href='home.php'>Home</a>
        <a href='signup.php' class="signup-button">Sign Up</a>
        <button class="new-user-button" onclick="window.location.href='newuser.php';">New User</button>

        <!-- Add the New User button next to the other buttons -->
        <h2>Search for Cars</h2>
        <form method="post" action="">
            <input type="text" name="search" placeholder="Enter search criteria">
            <input type="submit" value="Search">
        </form>

        <?php
        // Your PHP code for handling search and displaying results goes here
        ?>

        <?php
        $host = "localhost";
        $username = "2107130";
        $password = "password123";
        $database = "db2107130";

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the search form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize and escape the search input to prevent SQL injection
            $search = $conn->real_escape_string($_POST["search"]);

            // Modify the SQL query to include the search criteria
            $sql = "SELECT * FROM `Cars` WHERE `Make` LIKE '%$search%' OR `Model` LIKE '%$search%' OR `Year` LIKE '%$search%' OR `Price` LIKE '%$search%'"; // Adjust the columns as needed
			
            $result = $conn->query($sql);

            if ($result === false) {
                echo "Error: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    // Fetch data and display it in a table
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Vehicle ID Number</th>';
                    echo '<th>Image</th>';
                    echo '<th>Make</th>';
                    echo '<th>Model</th>';
                    echo '<th>Year</th>';
                    echo '<th>Price</th>';
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["Vehicle_ID_Number"] . '</td>';
                        echo '<td>' . "<img src='" . $row["image"] . "' alt='Product Image' style='width: 100px; height: auto;'>" . '</td>';
                        echo '<td>' . $row["Make"] . '</td>';
                        echo '<td>' . $row["Model"] . '</td>';
                        echo '<td>' . $row["Year"] . '</td>';
                        echo '<td>' . $row["Price"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "No results found.";
                }
            }
        } else {
            // Display all data in a table initially
            $sql = "SELECT * FROM `Cars`";
            $result = $conn->query($sql);

            if ($result === false) {
                echo "Error: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    // Fetch data and display it in a table
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Vehicle ID Number</th>';
                    echo '<th>Image</th>';
                    echo '<th>Make</th>';
                    echo '<th>Model</th>';
                    echo '<th>Year</th>';
                    echo '<th>Price</th>';
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["Vehicle_ID_Number"] . '</td>';
                        echo '<td>' . "<img src='" . $row["image"] . "' alt='Product Image' style='width: 100px; height: auto;'>" . '</td>';
                        echo '<td>' . $row["Make"] . '</td>';
                        echo '<td>' . $row["Model"] . '</td>';
                        echo '<td>' . $row["Year"] . '</td>';
                        echo '<td>' . $row["Price"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "No cars available.";
                }
            }
        }

        // Close the connection
        $conn->close();
        ?>

        <!-- Add a sign-up button underneath the search bar -->
        <button class="signup-button" onclick="window.location.href='signup.php';">Sign Up</button>
    </div>
</body>

</html>
