<?php session_start();?>


<?php
if (isset($_SESSION['id'])) {
    echo "<pre>";
    print_r($_SESSION); 
    echo "</pre>";
} else {
    echo "User is not logged in.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-amber-400 text-2xl font-bold">Restaurant</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="../app/App.php" class="text-white hover:text-amber-400" >Home</a></li>
                    <li><a href="#about-us" class="text-white hover:text-amber-400" onclick="scrollToAbout()">About</a></li>
                    <li><a href="#" class="text-white hover:text-amber-400" onclick="scrollToService()">Services</a></li>
                    <li><a href="../app/booking.php" class="text-white hover:text-amber-400">Booking</a></li>
                    <li><a href="#" class="text-white hover:text-amber-400">Cart</a></li>
                    <?php if (isset($_SESSION['id'])): ?>
                        <!-- If user is logged in, show their first name -->
                        <li class="text-white">Welcome, <?php echo htmlspecialchars(strtoupper($_SESSION['first_name'])); ?></li>
                        <li><a href="../logs/sign-out.php" class="text-white hover:text-amber-400">Logout</a></li>
                    <?php else: ?>
                        <!-- If user is not logged in, show login link -->
                        <li><a href="../logs/sign-in.php" class="text-white hover:text-amber-400">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>