<?php
header('Content-Type: application/json');

require_once '../db/db_connect.php';

$sql = "SELECT bus_no, route, latitude, longitude FROM bus_locations";
$result = $conn->query($sql);

$buses = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buses[] = $row;
    }
}

echo json_encode($buses);
$conn->close();
?>
