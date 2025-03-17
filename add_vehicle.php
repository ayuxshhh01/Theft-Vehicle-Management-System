<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner_name = $_POST['owner_name'];
    $vehicle_model = $_POST['vehicle_model'];
    $license_plate = $_POST['license_plate'];

    $sql = "INSERT INTO vehicles (owner_name, vehicle_model, license_plate) VALUES ('$owner_name', '$vehicle_model', '$license_plate')";

    if ($conn->query($sql) === TRUE) {
        echo "Vehicle reported successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Add Vehicle</h3>
        </div>
        <div class="card-body">
            <form action="add_vehicle.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Vehicle Number</label>
                    <input type="text" name="vehicle_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="stolen">Stolen</option>
                        <option value="under investigation">Under Investigation</option>
                        <option value="recovered">Recovered</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Vehicle</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
