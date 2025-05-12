<?php
require_once '../db/db_connect.php';

$sql = "SELECT id, latitude, longitude FROM bus_locations";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $newLat = $row['latitude'] + (rand(-5, 5) / 10000); // very small random shift
    $newLng = $row['longitude'] + (rand(-5, 5) / 10000);

    $update = $conn->prepare("UPDATE bus_locations SET latitude = ?, longitude = ? WHERE id = ?");
    $update->bind_param("ddi", $newLat, $newLng, $row['id']);
    $update->execute();
}
$conn->close();

echo "Locations updated.";
