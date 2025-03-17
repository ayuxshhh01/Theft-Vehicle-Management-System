<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Theft Vehicle Management System</a>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="text-center">Welcome, <?php echo $_SESSION['role']; ?>!</h2>
        <p class="text-center">Your Email: <?php echo $_SESSION['email']; ?></p>
    </div>
</body>
</html>
<?php
// Start the session

// Include database connection
include 'db_connect.php';

// Debug: Check if connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch analytics data with error handling
$totalUsers = $totalReports = $solvedCases = 0;

// Query for total users
$query = "SELECT COUNT(*) AS total FROM users";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total'];
} else {
    die("Error in query: " . $conn->error . " | SQL: " . $query);
}

// Query for total reports
$query = "SELECT COUNT(*) AS total FROM stolen_vehicles";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalReports = $row['total'];
} else {
    die("Error in query: " . $conn->error . " | SQL: " . $query);
}

// Query for solved cases (recovered vehicles)
$query = "SELECT COUNT(*) AS total FROM stolen_vehicles WHERE status='recovered'";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $solvedCases = $row['total'];
} else {
    die("Error in query: " . $conn->error . " | SQL: " . $query);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    </nav>
    <div class="container mt-4">
        <h2 class="text-center">Dashboard Analytics</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text display-4"><?php echo $totalUsers; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Theft Reports</h5>
                        <p class="card-text display-4"><?php echo $totalReports; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Recovered Cases</h5>
                        <p class="card-text display-4"><?php echo $solvedCases; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<a href="remote_control.php?vehicle_id=1" class="btn btn-danger">Disable Engine</a>


