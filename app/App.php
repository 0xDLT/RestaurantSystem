<?php 
ob_start();
?>
<?php require '../config/database.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/input.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>Restaurant</title>
</head>
<body>
    <div class="bg-cover bg-center h-screen flex flex-col" style="background-image: url('../img/food.jpg');"> 
        <?php include '../app/header.php';?> <!--include header-->
        
        <div class="flex flex-col justify-center items-start h-full p-4">

            <h1 class="mb-14 md:mt-14 text-white text-4xl md:text-6xl lg:text-8xl font-bold  left-0 top-1/2 transform -translate-y-1/2 pl-4 ">Enjoy Our <span class="block mb-0">Delicious Meal</span></h1>
            
            <p class="mt-14 md:mt-14 text-white  font-bold  left-0 top-1/2 transform -translate-y-1/2 pl-4 w-full max-w-6xl text-sm md:text-base lg:text-lg ">Welcome to Savory Haven, where culinary dreams come to life! Nestled in the heart of the city, 
                our charming bistro offers a warm, inviting atmosphere perfect for any occasion. Indulge in a seasonal menu crafted with locally sourced ingredients, 
                featuring vibrant flavors and innovative dishes. From artisanal pastas to mouthwatering desserts, each bite is a celebration of taste. 
                Pair your meal with our curated selection of wines and craft cocktails. Whether you’re here for a cozy dinner or a lively brunch with friends, 
                Savory Haven is your go-to destination for unforgettable dining experiences.</p>
            
            <div class="absolute bottom-0 left-0 p-4">
                <button onclick="scrollToBooking()" class="bg-amber-400 text-white text-lg md:text-2xl lg:text-4xl mb-10 ml-10 font-bold py-4 md:py-6 px-6 md:px-8 rounded-[30px] hover:bg-white hover:text-amber-400">
                    BOOK A TABLE
                </button>
            </div>
        </div>
    </div>
    
    <!--cards-->
    <div id='contact' class="container mx-auto px-4 py-8 mt-64">
    <h2 class="text-3xl font-bold text-center mb-6 text-amber-400">Our Services</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 text-center transition-colors duration-300 hover:bg-amber-400 hover:text-white" data-aos="fade-up" data-aos-delay="100">
            <img src="../icons/user.png" alt="by Kiranshastry" class="w-20 h-20 mb-4 mx-auto">
            <h3 class="text-5xl font-semibold mb-4">Master Chefs</h3>
            <p class="mb-0 text-2xl">Experience culinary artistry from our skilled chefs.</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center transition-colors duration-300 hover:bg-amber-400 hover:text-white" data-aos="fade-up" data-aos-delay="200">
            <img src="../icons/cutlery.png" alt="by Pixel perfect" class="w-20 h-20 mb-4 mx-auto">
            <h3 class="text-5xl font-semibold mb-4">Quality Food</h3>
            <p class="mb-0 text-2xl">We use only the freshest ingredients in our dishes.</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center transition-colors duration-300 hover:bg-amber-400 hover:text-white" data-aos="fade-up" data-aos-delay="300">
            <img src="../icons/grocery-store.png" alt="by Frey Wazza" class="w-20 h-20 mb-4 mx-auto">
            <h3 class="text-5xl font-semibold mb-4">Online Order</h3>
            <p class="mb-0 text-2xl">Enjoy hassle-free online ordering for your convenience.</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center transition-colors duration-300 hover:bg-amber-400 hover:text-white" data-aos="fade-up" data-aos-delay="400">
            <img src="../icons/24-hours.png" alt="by Uniconlabs" class="w-20 h-20 mb-4 mx-auto">
            <h3 class="text-5xl font-semibold mb-4">24/7 Service</h3>
            <p class="mb-0 text-2xl">Our service is available around the clock to serve you.</p>
        </div>
    </div>
    </div>
    
            
    <!--about us-->
    <div id="about-us" class="container mx-auto px-4 py-8 mt-64" data-aos="fade-up" data-aos-delay="100"> <!-- Staggered delay -->
    <h2 class="text-3xl font-bold text-center mb-6 text-amber-400" data-aos="fade-up" data-aos-delay="200">About Us</h2> <!-- Delayed for the header -->
    <div class="flex flex-col md:flex-row items-center" data-aos="fade-up" data-aos-delay="300"> <!-- Delayed for the flex container -->
        <img src="../img/restaurant.jpg" alt="Restaurant Image" class="w-full md:w-1/2 h-auto mb-4 md:mr-4 rounded-lg">
        <div class="top-1/2 w-2/3 pt-4">
            <h1 class="text-2xl md:text-4xl font-bold mb-4 text-amber-400" data-aos="fade-up" data-aos-delay="400">Welcome to Our Restaurant</h1> <!-- Delayed for the H1 -->
            <p class="text-sm md:text-base text-gray-700" data-aos="fade-up" data-aos-delay="400"> <!-- Delayed for the paragraph -->
                At Savory Haven, we pride ourselves on providing an exceptional dining experience. Our culinary team is dedicated to crafting delicious meals using the freshest ingredients. Whether you are celebrating a special occasion or enjoying a casual meal, our warm and inviting atmosphere will make you feel right at home. Join us for a culinary journey that delights the senses and creates lasting memories.
            </p>
        </div>
    </div>
    </div>




    <!-- Food Menu Section -->
    <section class="max-w-5xl mx-auto py-10 text-center mt-64">
    <h2 class="text-2xl font-semibold text-yellow-700">-- FOOD MENU --</h2>
    <h3 class="text-3xl font-bold mt-4">Most Popular Items</h3>

    <!-- Horizontal Scrollable Categories -->
        <div class="mt-8 overflow-x-auto">
            <div class="flex space-x-10 px-4 w-max">

                <!-- Breakfast Category -->
                <div class="text-left min-w-[300px]">
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios-filled/50/FFC107/coffee.png" alt="Breakfast Icon" class="mb-2">
                        <h4 class="text-xl font-semibold mb-4">Breakfast</h4>
                    </div>
                    <div>
                        <!-- Breakfast Items -->
                        <div class="space-y-4">
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Pancakes</h4>
                                    <p class="font-bold text-yellow-700">$5</p>
                                    <input type="hidden" name="item_name" value="Pancakes">
                                    <input type="hidden" name="price" value="5">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Eggs & Toast</h4>
                                    <p class="font-bold text-yellow-700">$7</p>
                                    <input type="hidden" name="item_name" value="Eggs & Toast">
                                    <input type="hidden" name="price" value="7">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Lunch Category -->
                <div class="text-left min-w-[300px]">
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios-filled/50/FFC107/hamburger.png" alt="Lunch Icon" class="mb-2">
                        <h4 class="text-xl font-semibold mb-4">Lunch</h4>
                    </div>
                    <div>
                        <!-- Lunch Items -->
                        <div class="space-y-4">
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Cheeseburger</h4>
                                    <p class="font-bold text-yellow-700">$8</p>
                                    <input type="hidden" name="item_name" value="Cheeseburger">
                                    <input type="hidden" name="price" value="8">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Caesar Salad</h4>
                                    <p class="font-bold text-yellow-700">$6</p>
                                    <input type="hidden" name="item_name" value="Caesar Salad">
                                    <input type="hidden" name="price" value="6">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Dinner Category -->
                <div class="text-left min-w-[300px]">
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios-filled/50/FFC107/dinner.png" alt="Dinner Icon" class="mb-2">
                        <h4 class="text-xl font-semibold mb-4">Dinner</h4>
                    </div>
                    <div>
                        <!-- Dinner Items -->
                        <div class="space-y-4">
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Steak</h4>
                                    <p class="font-bold text-yellow-700">$12</p>
                                    <input type="hidden" name="item_name" value="Steak">
                                    <input type="hidden" name="price" value="12">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                            <form action="../reservations/cart.php" method="POST">
                                <div class="border p-4 rounded-lg bg-white">
                                    <h4 class="text-lg font-semibold">Grilled Salmon</h4>
                                    <p class="font-bold text-yellow-700">$15</p>
                                    <input type="hidden" name="item_name" value="Grilled Salmon">
                                    <input type="hidden" name="price" value="15">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



        <!--book A table panil-->
    <div id="booking" class="bg-cover bg-center h-screen flex flex-col mt-64" style="background-image: url('../img/food.jpg');"> 
        <div class="flex flex-col justify-center items-start h-full p-4">
                <div class="max-w-4xl mx-auto text-center py-12 px-6 bg-blue-900 text-white rounded-lg shadow-lg">
                    <!-- Booking Header -->
                    <h2 class="text-yellow-400 text-2xl font-medium uppercase mb-2">Booking --</h2>
                    <h1 class="text-4xl font-bold uppercase mb-8">Book A Table Online</h1>

                    <!-- Booking Form -->
                    <form action="../reservations/booking.php" method="POST" class="grid grid-cols-2 gap-4">

                        <!-- Date & Time -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="datetime" class="block text-lg font-medium">Date & Time</label>
                            <input type="datetime-local" id="datetime" name="datetime" class="w-full mt-2 p-4 rounded-lg text-black" required>
                        </div>

                        <!-- No of People -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="people" class="block text-lg font-medium">No Of People</label>
                            <input type="number" id="people" name="people" class="w-full mt-2 p-4 rounded-lg text-black" placeholder="No Of People" required>
                        </div>

                        <!-- Special Request -->
                        <div class="col-span-2">
                            <label for="request" class="block text-lg font-medium">Special Request</label>
                            <textarea id="request" name="request" rows="3" class="w-full mt-2 p-4 rounded-lg text-black" placeholder="Any Special Request"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-span-2">
                            <button type="submit" class="w-full py-3 mt-4 bg-yellow-500 text-black font-bold text-lg rounded-lg hover:bg-yellow-400 transition duration-300">Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>




    <!--comments-->
<?php
    $comments = []; // Initialize as empty array

    $sql = "SELECT comments.comment, users.first_name FROM comments JOIN users ON comments.user_id = users.id ORDER BY comments.created_at DESC";
    $stmt = $dbconnect->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


    <div class="grid place-items-center mt-64 mb-64">
    <h2 class="text-center text-yellow-500 text-lg font-medium mb-2">~ TESTIMONIAL ~</h2>

    <!-- Comment form -->
    <?php if (isset($_SESSION['id'])): ?>
        <form action="../reservations/comments.php" method="POST" class="mb-4">
            <textarea name="comment" rows="3" class="border rounded p-2 w-full" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="mt-2 bg-yellow-500 text-white rounded p-2">Submit</button>
        </form>
    <?php else: ?>
        <p class="text-yellow-500">Please log in to leave a comment.</p>
    <?php endif; ?>

    <!-- Horizontal scroll container -->
    <div id="testimonialContainer" class="w-full max-w-screen-lg overflow-x-auto no-scrollbar whitespace-nowrap py-4">
        <div id="scrollContent" class="inline-flex space-x-4">
            <!-- Display comments -->
            <?php foreach ($comments as $comment): ?>
                <div class="rounded-lg min-w-[300px] bg-white p-4">
                    <div class="bg-yellow-400 p-6 rounded-lg">
                        <div class="text-white text-5xl leading-none mb-4">&#10077;</div>
                        <p class="text-white text-lg font-light"><?= htmlspecialchars($comment['comment']) ?></p>
                        <p class="mt-6 text-white text-3xl font-bold"><?= htmlspecialchars($comment['first_name']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>


    <!--scroll to the top button-->
    <button id="scrollToTop" class="fixed bottom-4 right-4 bg-amber-400 text-white rounded-full p-6 md:p-10 text-4xl md:text-5xl shadow-lg hidden transition-opacity duration-300">
        ↑
    </button>


<!--comments Auto-scroll-->
<script src="../scrollingUtils/commentsAutoScroll.js"></script>
<!--scroll to booking-->
<script src="../scrollingUtils/scrollToBooking.js"></script>
<!--scroll to contact-->
<script src="../scrollingUtils/scrollToContact.js"></script>
<!--scroll-top button-->
<script src="../scrollingUtils/scrollTopButton.js"></script>
<!--scroll to about us-->
<script src="../scrollUtils/scrollToAboutUs.js"></script>
</body>
</html>

<!--Cards animation-->
<script>
    AOS.init({
        duration: 600, // Animation duration
        once: false, // Animation repeats every time you scroll into view
    });
</script>

<?php ob_end_flush(); ?>