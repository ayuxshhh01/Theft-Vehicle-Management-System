<?php
include 'db_connect.php';

$vehicle_id = $_GET['vehicle_id'];
$sql = "SELECT * FROM gps_tracking WHERE vehicle_id = $vehicle_id ORDER BY tracked_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo "Location: " . $data['latitude'] . ", " . $data['longitude'];
} else {
    echo "No tracking data available.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var vehicleLocation = { lat: 28.7041, lng: 77.1025 }; // Example: Fetch from DB dynamically
            var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: vehicleLocation });
            var marker = new google.maps.Marker({ position: vehicleLocation, map: map });
        }
    </script>
</head>
<body>
    <div id="map" style="height: 500px; width: 100%;"></div>
</body>
</html>

