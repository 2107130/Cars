<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f9f9f9 50%, #d9d9d9 50%);
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff; /* Match the homepage1.php header color */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 18px);
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff; /* Match the homepage1.php link color */
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff; /* Match the homepage1.php link color */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* A slightly darker shade for hover */
        }

        /* Additional styles for buttons */
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .navigation-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Match the homepage1.php link color */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .navigation-buttons button:hover {
            background-color: #0056b3; /* A slightly darker shade for hover */
        }

        /* Style for the "Sign Up" button */
        .signup-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745; /* Green color for contrast */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .signup-button:hover {
            background-color: #218838; /* A slightly darker shade for hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navigation-buttons">
            <button onclick="window.history.back()">Back</button>
            <a href="Cars.php"><button>Home</button></a>
            <a href="signup.php" class="signup-button">Sign Up</a>
        </div>

        <h1>User Accounts</h1>

        <!-- Update form -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="updateId">Enter ID to Update:</label>
            <input type="text" id="updateId" name="userid" placeholder="ID">

            <label for="updateFullname">Full Name:</label>
            <input type="text" id="updateFullname" name="fullname" placeholder="Enter Full Name">

            <label for="updateEmail">Email:</label>
            <input type="email" id="updateEmail" name="email" placeholder="Enter Email">

            <label for="updatePassword">Password:</label>
            <input type="password" id="updatePassword" name="password" placeholder="Enter Password">

            <input type="submit" name="update" value="Update">
        </form>

        <!-- Delete form -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="deleteId">Enter ID to Delete:</label>
            <input type="text" id="deleteId" name="userid" placeholder="ID">
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
</body>

</html>
