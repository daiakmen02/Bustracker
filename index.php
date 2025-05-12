<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Bus Schedule Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        /* Base Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f7fa; /* Light Teal Background */
            overflow-x: hidden;
        }

        /* Header */
        header {
            background-color: rgba(69, 90, 100, 0.7); /* Dark Grey-Blue overlay */
            color: #fff;
            padding: 70px 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            background-image: url('https://source.unsplash.com/1600x900/?public+transport,city'); /* City with public transport */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            z-index: 1;
        }

        header h1 {
            font-size: 3.8rem;
            margin: 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500;
            animation: fadeIn 2s ease-out;
        }

        header p {
            font-size: 1.6rem;
            margin-top: 12px;
            opacity: 0.9;
        }

        header .btn {
            background-color: #009688; /* Teal Accent */
            color: white;
            text-decoration: none;
            padding: 16px 45px;
            border-radius: 35px;
            font-size: 1.2rem;
            display: inline-block;
            margin-top: 35px;
            transition: transform 0.3s, background-color 0.3s ease-in-out;
        }

        header .btn:hover {
            background-color: #00796b;
            transform: translateY(-5px);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Main Section */
        main {
            text-align: center;
            padding: 60px 30px;
            background-color: #fff; /* White Main Section */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 900px;
        }

        main h2 {
            font-size: 2.8rem;
            color: #37474f; /* Dark Grey-Blue */
            margin-bottom: 45px;
            font-weight: bold;
        }

        .feature-btns {
            display: flex;
            justify-content: center;
            gap: 35px;
            flex-wrap: wrap;
        }

        .feature-btns .btn {
            padding: 20px 40px;
            font-size: 1.3rem;
            border-radius: 12px;
            background-color: #4caf50; /* Green Accent */
            color: white;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .feature-btns .btn:hover {
            background-color: #388e3c;
            transform: translateY(-5px);
        }

        /* Footer Section */
        .footer {
            text-align: center;
            padding: 25px 0;
            background-color: #263238; /* Dark Blue-Grey Footer */
            color: #cfd8dc; /* Light Blue-Grey Text */
            margin-top: 60px;
        }

        .footer p {
            font-size: 1.1rem;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            header h1 {
                font-size: 3rem;
            }

            header p {
                font-size: 1.4rem;
            }

            .feature-btns {
                flex-direction: column;
                gap: 25px;
            }

            .feature-btns .btn {
                font-size: 1.1rem;
                padding: 18px 35px;
            }

            main h2 {
                font-size: 2.5rem;
                margin-bottom: 35px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>University Bus Schedule Tracker</h1>
        <p>Track your university buses in real-time, view schedules, and more!</p>
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Register</a>
    </header>

    <main>
        <h2>Explore the Features</h2>
        <div class="feature-btns">
            <a href="map.php" class="btn">View Live Bus Map</a>
            <a href="schedule.php" class="btn">View Bus Schedule</a>
            <a href="dashboard.php" class="btn">Go to Dashboard</a>
        </div>
    </main>

    <div class="footer">
        <p>&copy; 2025 University Bus Tracker | All Rights Reserved</p>
    </div>

</body>

</html>