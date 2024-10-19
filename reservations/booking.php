<!--Check if the user is logged in to submit a booking-->
<?php
require '../config/database.php';
session_start();

if (isset($_SESSION['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the required fields are present in the POST request
        if (isset($_POST['datetime'], $_POST['people'], $_POST['request'])) {
            $booking_datetime = $_POST['datetime'];
            $number_of_people = $_POST['people'];
            $special_requests = $_POST['request'];
            $user_id = $_SESSION['id'];

            // Prepare and execute the SQL statement
            $sql = "INSERT INTO bookings (user_id, booking_datetime, number_of_people, special_requests) VALUES (?, ?, ?, ?)";
            $stmt = $dbconnect->prepare($sql);
            $stmt->execute([$user_id, $booking_datetime, $number_of_people, $special_requests]);

            $_SESSION['alert'] = 'Booked a table';
            header('location: ../app/index.php');
            exit();
        } 
    }
}

if (isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']); // Clear the message after displaying it
}

header("location: ../app/App.php");
exit();
?>