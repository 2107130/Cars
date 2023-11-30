<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <style>
	 body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; /* Set the background color to match homepage1.php */
            color: #333;
        }

        header {
            background-color: #007bff; /* Match the homepage1.php header color */
            color: #fff;
            padding: 15px;
            text-align: center;
            position: relative;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff; /* Set the background color to white */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #007bff; /* Match the homepage1.php link color */
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 70%;
            margin-right: 10px;
        }

        input[type="submit"], a.button {
            padding: 10px;
            background-color: #007bff; /* Match the homepage1.php link color */
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .basket-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .basket-icon img {
            width: 60px; /* Increased size */
            height: 60px; /* Increased size */
            background: none; /* Removed background */
        }

        .basket-caption {
            color: #007bff;
            font-size: 14px;
            margin-top: 5px;
        }

        .basket-count {
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
            margin-top: -15px;
        }

        .view-basket-button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff; /* Match the homepage1.php link color */
            color: #fff;
        }

        button {
            padding: 10px;
            background-color: #555;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        button.signup-button {
            background-color: #555;
            margin-top: 10px;
        }
		 /* Add your styles here */
    </style>
	
    <!-- Include jQuery -->
  <!-- Add your head content here -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function () {
            // Add an event listener to the search input field
            $('input[name="search"]').on('input', function () {
                var searchValue = $(this).val();

                // Fetch suggestions based on the user's input
                $.post('get_suggestions.php', { search: searchValue }, function (data) {
                    // Update the suggestion list
                    $('#suggestionList').html(data);
                });
            });

            // Handle clicks on suggestions
            $(document).on('click', '.suggestion-item', function () {
                // Set the clicked suggestion as the search input value
                var suggestionValue = $(this).text();
                $('input[name="search"]').val(suggestionValue);

                // Trigger the form submission
                $('form').submit();
            });

            // ... (your existing code)
        });
</script>


</head>

<body>

    <header>
        <!-- Add your header content here -->
        <h1 style="margin: 0;">Car Listings</h1>
        <div class="basket-icon" onclick="viewBasket()">
            <img src="https://previews.123rf.com/images/puruan/puruan1702/puruan170203379/71990756-car-shopping-icon-in-flat-color-style-business-automotive-auto-buying-retail-sale.jpg" alt="Basket Icon">
            <div class="basket-caption">Basket</div>
            
        </div>
        <a href="basket.php" class="view-basket-button">View Basket</a>
    </header>

    <div class="container">

        <a href="homepage1.php" class="button">Back to Homepage</a>

        <h2>Search for Cars</h2>
        <form method="post" action="">
            <input type="text" name="search" placeholder="Enter search criteria">
            <input type="submit" value="Search">
        </form>

        
        // Your PHP code for handling search and displaying results goes here
        
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
                    echo '<th>Action</th>'; // Added column for action
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["Vehicle_ID_Number"] . '</td>';
                        echo '<td>' . "<img src='" . $row["image"] . "' alt='Product Image' style='width: 100px; height: auto;'>" . '</td>';
                        echo '<td>' . $row["Make"] . '</td>';
                        echo '<td>' . $row["Model"] . '</td>';
                        echo '<td>' . $row["Year"] . '</td>';
                        echo '<td>' . $row["Price"] . '</td>';
                        echo '<td>' . '<button class="add-to-basket-button" data-vehicle-id="' . $row["Vehicle_ID_Number"] . '">Add to Basket</button>' . '</td>';

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
                    echo '<th>Action</th>'; // Added column for action
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["Vehicle_ID_Number"] . '</td>';
                        echo '<td>' . "<img src='" . $row["image"] . "' alt='Product Image' style='width: 100px; height: auto;'>" . '</td>';
                        echo '<td>' . $row["Make"] . '</td>';
                        echo '<td>' . $row["Model"] . '</td>';
                        echo '<td>' . $row["Year"] . '</td>';
                        echo '<td>' . $row["Price"] . '</td>';
                        echo '<td>' . '<button class="add-to-basket-button" data-vehicle-id="' . $row["Vehicle_ID_Number"] . '">Add to Basket</button>' . '</td>'; // Added add to basket button
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
    </div>
</body>
</html>
