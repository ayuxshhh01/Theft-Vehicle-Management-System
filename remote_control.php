<?php
include('db_connect.php');
if(isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];
    $query = "UPDATE vehicles SET status='immobilized' WHERE id='$vehicle_id'";
    mysqli_query($conn, $query);
    echo "Vehicle Immobilized Successfully!";
}
?>
