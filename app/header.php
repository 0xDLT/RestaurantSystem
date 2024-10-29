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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <style>
        /* Full screen mobile menu styles */
        #mobileMenu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #1e3a8a; /* Tailwind blue-800 */
            z-index: 50; /* Make sure it appears above other content */
        }
    </style>
</head>
<body>
    <header class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-amber-400 text-2xl font-bold">Restaurant</h1>
            <button id="hamburger" class="block md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <nav id="navMenu" class="hidden md:flex md:space-x-4">
                <ul class="flex space-x-4">
                    <li><a href="../app/App.php" class="text-white hover:text-amber-400">Home</a></li>
                    <li><a href="#about-us" class="text-white hover:text-amber-400" onclick="scrollToAbout()">About</a></li>
                    <li><a href="#" class="text-white hover:text-amber-400" onclick="scrollToService()">Services</a></li>
                    <li><a href="../app/booking.php" class="text-white hover:text-amber-400">Booking</a></li>
                    <li><a href="../app/cart.php" class="text-white hover:text-amber-400">Cart</a></li>
                    <?php if (isset($_SESSION['id'])): ?>
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <li><a href="../app/dashboard.php" class="text-white hover:text-amber-400">Dashboard</a></li>
                            <?php endif; ?>
                        <li class="text-white">Welcome, <?php echo htmlspecialchars(strtoupper($_SESSION['first_name'])); ?></li>
                        <li><a href="../logs/sign-out.php" class="text-white hover:text-amber-400">Logout</a></li>
                    <?php else: ?>
                        <li><a href="../logs/sign-in.php" class="text-white hover:text-amber-400">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Mobile menu, hidden by default -->
    <nav id="mobileMenu" class="hidden md:hidden">
        <div class="flex justify-end p-4">
            <button id="closeMenu" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <ul class="flex flex-col items-center justify-center h-full text-white">
            <li class="mb-4"><a href="../app/App.php" class="hover:text-amber-400" onclick="closeMobileMenu()">Home</a></li>
            <li class="mb-4"><a href="#about-us" class="hover:text-amber-400" onclick="scrollToAbout(); closeMobileMenu()">About</a></li>
            <li class="mb-4"><a href="#" class="hover:text-amber-400" onclick="scrollToService(); closeMobileMenu()">Services</a></li>
            <li class="mb-4"><a href="../app/booking.php" class="hover:text-amber-400" onclick="closeMobileMenu()">Booking</a></li>
            <li class="mb-4"><a href="../app/cart.php" class="hover:text-amber-400" onclick="closeMobileMenu()">Cart</a></li>
            <?php if (isset($_SESSION['id'])): ?>
                <li class="mb-4">Welcome, <?php echo htmlspecialchars(strtoupper($_SESSION['first_name'])); ?></li>
                <li><a href="../logs/sign-out.php" class="hover:text-amber-400" onclick="closeMobileMenu()">Logout</a></li>
            <?php else: ?>
                <li><a href="../logs/sign-in.php" class="hover:text-amber-400" onclick="closeMobileMenu()">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenu = document.getElementById('closeMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });

        // Function to close the mobile menu
        function closeMobileMenu() {
            mobileMenu.classList.add('hidden');
        }
    </script>
</body>
</html>