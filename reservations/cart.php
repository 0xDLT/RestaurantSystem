<?php
require '../config/database.php';
session_start();

header("location: ../app/App.php");
exit();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the user is logged in
    if (!isset($_SESSION['id'])) {
        echo "<script>alert('You need to log in to add items to your cart.')</script>";
    }

if (isset($_POST['item_name']) && isset($_POST['price']) && isset($_POST['quantity'])) {
      $userId = $_SESSION['id']; // Get the user ID from session
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    try {
          // Prepare the SQL statement
        $stmt = $dbconnect->prepare("INSERT INTO cart (user_id, item_name, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $itemName, $price, $quantity]);


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        $_SESSION['cart'] = 'add to your cart';
        header('location: ../app/index.php'); 
        exit();
    } else {
        echo "Invalid request.";
    }
}
if (isset($_SESSION['cart'])) {
    echo "<script>alert('" . $_SESSION['cart'] . "');</>";
    unset($_SESSION['cart']); // Clear the message after displaying it
}
?>