<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db/db_connect.php';

$sql = "SELECT bus_no, route, time FROM bus_schedule ORDER BY bus_no, time";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Schedule</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
        }

        header {
            background-color: #0066cc;
            color: white;
            padding: 15px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        caption {
            margin-bottom: 15px;
            font-size: 1.5em;
            font-weight: bold;
        }

        .back-btn {
            display: block;
            margin: 20px auto;
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 200px;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #3498db;
        }

        .search-container {
            text-align: center;
            margin-top: 20px;
        }

        #searchInput {
            width: 60%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <header>
        <h2>University Bus Schedule</h2>
    </header>

    <main>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by Bus No or Route">
        </div>

        <table id="scheduleTable">
            <caption>All Buses and Timings</caption>
            <thead>
                <tr>
                    <th>Bus Number</th>
                    <th>Route</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['bus_no']) ?></td>
                            <td><?= htmlspecialchars($row['route']) ?></td>
                            <td><?= date("h:i A", strtotime($row['time'])) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="3">No schedule found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <button class="back-btn" onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </main>

    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll("#scheduleTable tbody tr");

            rows.forEach(row => {
                const busNo = row.cells[0].textContent.toLowerCase();
                const route = row.cells[1].textContent.toLowerCase();
                const match = busNo.includes(query) || route.includes(query);
                row.style.display = match ? "" : "none";
            });
        });
    </script>

</body>
</html>

<?php $conn->close(); ?>
