<?php
session_start();
require '../config/database.php';

// Check if the user is logged in and has the admin role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    try {
        // Prepare and execute the query to sum the price column in the cart table
        $stmt = $dbconnect->query("SELECT SUM(price) AS total_sales FROM cart");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Get the total sales value, default to 0 if no sales exist
        $totalSales = $result['total_sales'] ?? 0;

        // Format the total sales for display
        $formattedTotalSales = number_format($totalSales, 2);

        // Query to count total number of users
        $stmtUsers = $dbconnect->query("SELECT COUNT(*) AS total_users FROM users");
        $resultUsers = $stmtUsers->fetch(PDO::FETCH_ASSOC);
        
        // Get the total number of users, default to 0 if no users exist
        $totalUsers = $resultUsers['total_users'] ?? 0;

        // Query to get the latest 5 users signed up based on their IDs
        $stmtLatestUsers = $dbconnect->query("SELECT first_name, last_name FROM users ORDER BY id DESC LIMIT 5");
        $latestUsers = $stmtLatestUsers->fetchAll(PDO::FETCH_ASSOC);

        // Query to get bookings
        $stmtBookings = $dbconnect->query("
            SELECT u.first_name, u.last_name, b.booking_datetime, b.number_of_people 
            FROM bookings b 
            JOIN users u ON b.user_id = u.id
            ORDER BY b.booking_datetime DESC
            LIMIT 5
        ");
        $bookings = $stmtBookings->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        $totalSales = 0; 
        $totalUsers = 0; 
        $latestUsers = []; 
    }
} else {
    // Optionally handle cases for non-admin users
    echo "Access Denied. You do not have permission to view this page.";
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>DashBoard</title>
</head>
<body class="bg-gray-100 h-screen">
    <header>
        <div  class="flex justify-between items-center p-4">
            <h2 class="text-yellow-500">DashBoard</h2>
            <h2><a class= " hover:text-indigo-800 " href="../app/App.php">back home</a></h2>
        </div>
    </header>

    <!-- Main Content and Menu Section -->
    <div class="flex h-screen mt-4">
        <!-- Main Content Section -->
        <div class="bg-gray-100 flex-grow flex flex-col items-center p-4">
            <!-- Analytics and Cards Section -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl mb-8">
                <h1 class="text-2xl font-semibold mb-4">Analytics Overview</h1>
                <p class="text-gray-600 mb-6">Insights into sales and user activity.</p>

                <div class="flex space-x-4">
                    <!-- Card 1: Total Sales -->
                    <div class="bg-gray-100 rounded-lg shadow-md p-4 w-64 h-48">
                        <h2 class="text-xl font-semibold">Total Sales</h2>
                        <p class="text-3xl font-bold text-blue-600">$<?php echo number_format($totalSales, 2); ?></p>
                        <p class="text-gray-600">Total of sales that have happened</p>
                    </div>

                    <!-- Card 2: Number of Users -->
                    <div class="bg-gray-100 rounded-lg shadow-md p-4 w-64 h-48">
                        <h2 class="text-xl font-semibold">Total Users</h2>
                        <p class="text-3xl font-bold text-green-600"><?php echo number_format($totalUsers); ?></p>
                        <p class="text-gray-600">Number of users that have signed up</p>
                    </div>
                </div>
            </div>

            
            <!-- Users Section -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl mb-8">
                <h1 class="text-2xl font-semibold mb-4">Latest Users</h1>
                <ul class="list-disc pl-5">
                    <?php if (!empty($latestUsers)): ?>
                        <?php foreach ($latestUsers as $user): ?>
                            <li><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No users found.</li>
                    <?php endif; ?>
                </ul>
            </div>


            <!-- Schedule Section -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl mt-8">
                <h1 class="text-2xl font-semibold mb-4">Schedule</h1>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Time</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">No. of People</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Details</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php if (!empty($bookings)): ?>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td class="px-4 py-2">
                            <?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['last_name']); ?>
                        </td>
                        <td class="px-4 py-2"><?php echo htmlspecialchars(date('d-m-Y H:i', strtotime($booking['booking_datetime']))); ?></td>
                        <td class="px-4 py-2"><?php echo htmlspecialchars($booking['number_of_people']); ?></td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-blue-600 hover:underline">View Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center">No bookings found.</td>
                </tr>
            <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="bg-white w-64 h-48 shadow-lg p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-1 p-2">Menu</h2>
            <ul class="space-y-0.5 px-2 pb-1">
                <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Users</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Schedule</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Items</a></li>
            </ul>
        </div>
    </div>
</body>
</html>