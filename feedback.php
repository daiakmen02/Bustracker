<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO feedback (user_id, message, submitted_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $user_id, $message);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Thank you for your feedback!'); window.location.href='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2980b9;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .feedback-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .feedback-container textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
            border: 2px solid #2980b9;
            resize: none;
            margin-bottom: 20px;
            outline: none;
        }

        .feedback-container textarea:focus {
            border-color: #3498db;
        }

        .feedback-container button {
            background-color: #2980b9;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .feedback-container button:hover {
            background-color: #3498db;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .back-link a {
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: #3498db;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .feedback-container {
                padding: 25px;
            }

            .feedback-container button {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

    <h2>We Value Your Feedback</h2>
    <div class="feedback-container">
        <form method="post">
            <textarea name="message" placeholder="Enter your feedback..." required></textarea>
            <button type="submit">Submit Feedback</button>
        </form>
        <div class="back-link">
            <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>

</body>
</html>
