<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars 4 Sale</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2, p {
            color: #333;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 2em; /* Adjusted font size */
        }

        h2 {
            font-size: 1.8em; /* Adjusted font size */
            color: #007bff; /* Blue color */
        }

        p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        a, button {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s ease;
            animation: scaleIn 0.5s ease-out;
        }

        a:hover, button:hover {
            text-decoration: underline;
            background-color: #0056b3; /* Darken the color on hover */
        }

        /* Adjusted styling for the "Vehicles" button */
        a.button {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        /* Added styling for the "Contact Details" section */
        .contact-details {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        /* Adjusted styling for the email address */
        .contact-details p {
            font-size: 0.9em;
        }

        /* Added styling for the "Opening Times" section */
        .opening-times {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        /* Animation for the buttons */
        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Cars 4 Sale</h1>
    </header>

    <div class="container">
        <!-- Vehicles Button -->
        <a href="Cars.php" class="button">Vehicles</a>

        <h2>Welcome to Cars at Super Affordable Prices!</h2>
        <p>
            Discover our diverse collection of quality cars at unbeatable prices.
        </p>
        <p>
            Utilize the advanced search options to find your dream car based on make, model, year, or price range.
        </p>
        <p>
            Ready to get started? <a href="user_accounts.php">Sign up</a> for personalized recommendations and exclusive offers.
        </p>

        <hr>

        <h2>About Cars 4 Sale</h2>
        <p>
            Cars 4 Sale is your go-to destination for finding high-quality, affordable vehicles. We pride ourselves on offering a diverse selection, from reliable daily drivers to stylish luxury cars. Our user-friendly search features make it easy to discover the perfect car for your needs. Join our community today and experience the joy of driving your dream car!
        </p>

        <!-- Contact Details -->
        <div class="contact-details">
            <h2>Contact Details</h2>
            <p>Email: <a href="mailto:m.z.islam2@wlv.ac.uk">m.z.islam2@wlv.ac.uk</a></p>
        </div>

        <!-- Opening Times -->
        <div class="opening-times">
            <h2>Opening Times</h2>
            <p>Monday: 9am - 5pm</p>
            <p>Tuesday: 9am - 5pm</p>
            <p>Wednesday: 9am - 5pm</p>
            <p>Thursday: 9am - 5pm</p>
            <p>Friday: 9am - 5pm</p>
            <p>Saturday: 9am - 5pm</p>
            <p>Sunday: Closed</p>
        </div>
    </div>

</body>

</html>
