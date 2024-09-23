<?php require '../config/database.php';?>
<div class="bg-blue-500">
    <?php include "../app/header.php"; ?>
</div>

<?php
if (isset($_SESSION["id"])) {
    
    if (isset($_POST['cancel'])) {
        $bookingId = $_POST['book_id'];

        try {
            // Prepare a delete statement
            $deleteSql = 'DELETE FROM bookings WHERE book_id = :book_id AND user_id = :user_id';
            $deleteStmt = $dbconnect->prepare($deleteSql);

            // Bind parameters
            $deleteStmt->bindParam(':book_id', $bookingId, PDO::PARAM_INT);
            $deleteStmt->bindParam(':user_id', $_SESSION["id"], PDO::PARAM_INT);

            // Execute the delete statement
            $deleteStmt->execute();
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }

    try {
        
        // Prepare a query with a placeholder
        $sql ='SELECT book_id, booking_datetime, number_of_people, special_requests FROM bookings WHERE user_id = :user_id';
        $stmt = $dbconnect->prepare($sql);

        // Bind the user ID from the session
        $stmt->bindParam(':user_id', $_SESSION["id"], PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch all results
        $bookings = $stmt->fetchAll();

    } catch (PDOException $e) {
        // Handle error
        echo 'Database error: ' . $e->getMessage();
    }
}else{
    header("Location: ../logs/sign-in.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/input.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>Your Books</title>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Your Bookings</h1>

    <?php if (isset($error)): ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <?php if ($bookings): ?>
        <div class="bg-white shadow-md rounded-lg p-4">
            <?php foreach ($bookings as $booking): ?>
                <div class="border-b border-gray-200 py-4">
                    <p class="text-lg font-semibold">Booking Date and Time:</p>
                    <p class="text-gray-700"><?= htmlspecialchars($booking['booking_datetime']); ?></p>
                    
                    <p class="text-lg font-semibold">Number of People:</p>
                    <p class="text-gray-700"><?= htmlspecialchars($booking['number_of_people']); ?></p>
                    
                    <p class="text-lg font-semibold">Special Requests:</p>
                    <p class="text-gray-700"><?= htmlspecialchars($booking['special_requests']); ?></p>
                    
                    <form action="" method="post" class="mt-4">
                        <input type="hidden" name="book_id" value="<?= isset($booking['book_id']) ? htmlspecialchars($booking['book_id']) : ''; ?>">
                        <button type="submit" name="cancel" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                            Cancel Booking
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            <p>No bookings found for this user.</p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>