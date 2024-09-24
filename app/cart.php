<?php require "../config/database.php";?>
<div class="bg-blue-500">
    <?php include "../app/header.php"; ?>
</div>

<?php
// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo "You need to log in to view your cart.";
    exit;
}

$userId = $_SESSION['id'];

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_name'])) {
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    try {
        $stmt = $dbconnect->prepare("INSERT INTO cart (user_id, item_name, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $itemName, $price, $quantity]);
        $message = "Item added to cart successfully.";
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}

// Handle removing items from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
    $cartId = $_POST['cart_id'];

    try {
        $stmt = $dbconnect->prepare("DELETE FROM cart WHERE cart_id = ? AND user_id = ?");
        $stmt->execute([$cartId, $userId]);
        $removeMessage = "Item removed from cart successfully.";
    } catch (PDOException $e) {
        $removeError = "Error: " . $e->getMessage();
    }
}

// Fetch cart items for the logged-in user
$stmt = $dbconnect->prepare("SELECT * FROM cart WHERE user_id = ?");
$stmt->execute([$userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Your Cart</title>
</head>
<body class="bg-gray-100">

<section class="max-w-5xl mx-auto py-10 text-center mt-64">
    <h2 class="text-2xl font-semibold text-yellow-700">-- YOUR CART --</h2>

    <?php if (isset($message)) echo "<p class='text-green-500'>$message</p>"; ?>
    <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
    <?php if (isset($removeMessage)) echo "<p class='text-green-500'>$removeMessage</p>"; ?>
    <?php if (isset($removeError)) echo "<p class='text-red-500'>$removeError</p>"; ?>

    <div class="mt-8">
        <?php if (count($cartItems) > 0): ?>
            <div class="space-y-4">
                <?php foreach ($cartItems as $item): ?>
                    <div class="border p-4 rounded-lg bg-white flex justify-between items-center">
                        <div>
                            <h4 class="text-lg font-semibold"><?php echo htmlspecialchars($item['item_name']); ?></h4>
                            <p class="font-bold text-yellow-700">$<?php echo htmlspecialchars($item['price']); ?> x <?php echo htmlspecialchars($item['quantity']); ?></p>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                            <button type="submit" class="ml-4 py-2 px-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded">REMOVE</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <h3 class="text-3xl font-bold mt-4">Add Items to Your Cart</h3>
    <div class="mt-8">
        <form action="" method="POST">
            <div class="space-y-4">
                <div class="border p-4 rounded-lg bg-white">
                    <h4 class="text-lg font-semibold">Pancakes</h4>
                    <p class="font-bold text-yellow-700">$5</p>
                    <input type="hidden" name="item_name" value="Pancakes">
                    <input type="hidden" name="price" value="5">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                </div>
                <div class="border p-4 rounded-lg bg-white">
                    <h4 class="text-lg font-semibold">Eggs & Toast</h4>
                    <p class="font-bold text-yellow-700">$7</p>
                    <input type="hidden" name="item_name" value="Eggs & Toast">
                    <input type="hidden" name="price" value="7">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded">ADD TO CART</button>
                </div>
                <!-- Add more items as needed -->
            </div>
        </form>
    </div>
</section>
</body>
</html>
