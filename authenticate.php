<?php
session_start();
include 'db_connect.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Email or password is missing.");
}

// Secure input
$email = $conn->real_escape_string($email);
$password = md5($password); // Hash password before checking

$sql = "SELECT * FROM users WHERE username='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Store user details in session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role']; // Role is 'admin' or 'police'

    // Redirect based on role
    if ($user['role'] == 'admin') {
        header("Location: admin_dashboard.php");
    } elseif ($user['role'] == 'police') {
        header("Location: police_dashboard.php");
    } else {
        header("Location: user_dashboard.php");
    }
    exit();
} else {
    echo "User not found!";
}
if ($user_not_found) {
    echo "<script>alert('Unauthorized access attempt detected!');</script>";
}

?>

