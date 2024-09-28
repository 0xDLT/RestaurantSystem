<?php
require '../config/database.php';
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id'])) {
  $comment = trim($_POST['comment']);
  $userId = $_SESSION['id'];

  if (!empty($comment)) {
    $sql = "INSERT INTO comments (user_id, comment, created_at) VALUES (?, ?, NOW())";
      $stmt = $dbconnect->prepare($sql);
      $stmt->execute([$userId, $comment]);
      header('location: ../app/index.php');
      exit();
  }
}

// Fetch comments to display
    $stmt = $dbconnect->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>