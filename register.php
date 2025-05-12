<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db/db_connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6dd5ed, #2193b0); /* Same gradient as login */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            max-width: 90%;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-container h1 {
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 2.5rem;
        }

        .input-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .input-group label {
            display: block;
            color: #555;
            margin-bottom: 8px;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .input-group input[type="text"],
        .input-group input[type="email"],
        .input-group input[type="password"] {
            width: calc(100% - 22px);
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out;
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="email"]:focus,
        .input-group input[type="password"]:focus {
            border-color: #2193b0; /* Same focus color as login */
            outline: none;
            box-shadow: 0 0 5px rgba(33, 147, 176, 0.3);
        }

        .register-button {
            background: #2193b0; /* Same button background as login */
            color: white;
            padding: 14px 25px;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background 0.3s ease-in-out, transform 0.2s;
            width: 100%;
        }

        .register-button:hover {
            background: #19768e; /* Same button hover as login */
            transform: translateY(-2px);
        }

        .error {
            color: #e53935;
            margin-top: 20px;
            font-size: 1rem;
        }

        .login-link {
            margin-top: 25px;
            font-size: 1rem;
            color: #555;
        }

        .login-link a {
            color: #2193b0; /* Same link color as login */
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Subtle animation for background */
        @keyframes backgroundAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            background: linear-gradient(135deg, #6dd5ed, #2193b0); /* Same gradient as login */
            background-size: 200% 200%;
            animation: backgroundAnimation 15s ease infinite;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Join Us!</h1>
        <form method="POST" action="register.php">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="register-button">Register</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <p class="login-link">Already have an account? <a href="login.php">Log In</a></p>
    </div>
</body>
</html>