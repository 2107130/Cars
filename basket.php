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

            padding: 20px;

            background: #f9f9f9; /* Set the background color to match homepage1.php */

            color: #333;

        }

        .container {

            max-width: 800px;

            margin: 0 auto;

            background: #fff; /* Set the background color to white */

            padding: 20px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            border-radius: 5px;

        }

        h2 {

            text-align: center;

            font-size: 32px;

            margin-bottom: 20px;

            color: #007bff; /* Match the homepage1.php link color */

            text-transform: uppercase;

            letter-spacing: 2px;

            border-bottom: 2px solid #007bff; /* Match the homepage1.php link color */

            padding-bottom: 5px;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-bottom: 20px;

        }

        th, td {

            border: 1px solid #ddd;

            padding: 8px;

            text-align: center;

        }

        th {

            background-color: #007bff; /* Match the homepage1.php link color */

            color: #fff;

        }

        .delete-from-basket, .add-to-basket, .clear-basket {

            padding: 8px 16px;

            border: none;

            border-radius: 4px;

            cursor: pointer;

            transition: background-color 0.3s ease;

        }

        .delete-from-basket {

            background-color: #f44336;

            color: white;

            margin-right: 5px;

        }

        .add-to-basket {

            background-color: #4caf50;

            color: white;

        }

        .clear-basket {

            background-color: #d9534f;

            color: white;

            margin-left: 5px;

        }

        .btn-back {

            display: block;

            width: fit-content;

            margin: 20px auto;

            padding: 10px 20px;

            background-color: #007bff; /* Match the homepage1.php link color */

            color: white;

            text-decoration: none;

            border-radius: 5px;

            text-align: center;

        }

        .total-price {

            text-align: right;

            margin-bottom: 20px;

            font-weight: bold;

            font-size: 18px;

        }

    </style>

</head>

<body>

    <div class="container">

        <h2>Your Basket</h2>

        <div class="notification">

            <p>Product deleted from the basket successfully and stock level updated</p>

        </div>

        <table>

            <tr>

                <th>Product ID</th>

                <th>Make</th>

                <th>Model</th>

                <th>Year</th>

                <th>Price</th>

                <th>Action</th>

            </tr>

            <?php

            // Your PHP code to fetch data from the database

            $servername = "localhost";

            $username = "2107130";

            $password = "password123";

            $dbname = "db2107130";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);

            }

            $sql = "SELECT * FROM `Cars`";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" . $row["Vehicle_ID_Number"] . "</td>";

                    echo "<td>" . $row["Make"] . "</td>";

                    echo "<td>" . $row["Model"] . "</td>";

                    echo "<td>" . $row["Year"] . "</td>";

                    echo "<td>$" . $row["Price"] . "</td>";

                    echo "<td>";

                    echo "<button class='delete-from-basket' onclick='updateTotal(-" . $row["Price"] . ")'>Delete</button>";

                    echo "<button class='add-to-basket' onclick='updateTotal(" . $row["Price"] . ")'>Add to Basket</button>";

                    echo "</td>";

                    echo "</tr>";

                }

            } else {

                echo "0 results";

            }

            $conn->close();

            ?>

        </table>

        <p class="total-price">Total Price: <span id="totalPrice">$0</span></p>

        <button class="clear-basket" onclick="clearBasket()">Clear Basket</button>

        <a href="Cars.php" class="btn-back">Back to Shop</a>

    </div>

    <script>

        let totalPrice = 0;

        const totalPriceSpan = document.getElementById('totalPrice');

        function updateTotal(price) {

            totalPrice += price;

            totalPriceSpan.textContent = `$${totalPrice}`;

        }

        function clearBasket() {

            totalPrice = 0;

            totalPriceSpan.textContent = `$${totalPrice}`;

        }

    </script>

</body>

</html>
