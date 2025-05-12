<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bus Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQmXVf9TB/5sGczn0jlMqJx9JLEh+eVD/jvJ4EHbRvGGz/hPdKQGyAJ0dQObUtOBkl5ycFN2QqJPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #cdd8e0); /* Light and airy background */
            margin: 0;
            padding: 40px; /* Add some padding around the main content */
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Center content vertically */
            position: relative; /* For potential absolute positioning of elements */
            overflow: hidden; /* Prevent background elements from overflowing */
        }

        /* Subtle background shapes */
        body::before,
        body::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            background-color: rgba(0, 102, 153, 0.1); /* Soft blue accent */
            border-radius: 50%;
            opacity: 0.6;
            animation: pulse 4s infinite alternate;
        }

        body::before {
            top: 10%;
            left: 10%;
            transform: translate(-50%, -50%);
        }

        body::after {
            bottom: 15%;
            right: 15%;
            transform: translate(50%, 50%);
            width: 200px;
            height: 200px;
        }

        @keyframes pulse {
            from {
                transform: scale(1);
                opacity: 0.6;
            }
            to {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        header {
            text-align: center;
            margin-bottom: 50px;
        }

        h1 {
            font-size: 3rem;
            font-weight: 600;
            color: #0066cc;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.05);
        }

        main {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 900px;
            width: 100%;
        }

        .dashboard-card {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .dashboard-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 3.5rem;
            color: #007bff; /* Blue accent color */
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 500;
            color: #444;
            margin-bottom: 15px;
        }

        .card-link {
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 12px 30px;
            border: 2px solid #007bff;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .card-link:hover {
            background-color: #007bff;
            color: white;
        }

        /* Logout Button (can be placed outside main for better control) */
        .logout-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-btn {
            background: none;
            border: 2px solid #f44336; /* Red logout button */
            color: #f44336;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #f44336;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            main {
                grid-template-columns: 1fr; /* Stack cards on smaller screens */
                padding: 20px;
            }

            .dashboard-card {
                padding: 25px;
            }

            .card-icon {
                font-size: 3rem;
                margin-bottom: 15px;
            }

            .card-title {
                font-size: 1.6rem;
            }

            .card-link {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .logout-container {
                top: 10px;
                right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <a href="logout.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    <header>
        <h1>Your Bus Hub</h1>
    </header>
    <main>
        <div class="dashboard-card">
            <i class="fas fa-map-marker-alt card-icon"></i>
            <h2 class="card-title">Real-Time Bus Map</h2>
            <a href="map.php" class="card-link">View Map</a>
        </div>
        <div class="dashboard-card">
            <i class="fas fa-calendar-alt card-icon"></i>
            <h2 class="card-title">Bus Schedule</h2>
            <a href="schedule.php" class="card-link">View Schedule</a>
    </div>

            <div class="dashboard-card">
            <i class="fas fa-comment-alt card-icon"></i>
             <h2 class="card-title">Feedback</h2>
             <a href="feedback.php" class="card-link">Give Feedback</a>
            </div>

