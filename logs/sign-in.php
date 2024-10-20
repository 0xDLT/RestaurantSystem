<?php require "../config/database.php";?>
<div class="bg-blue-500">
    <?php include "../app/header.php"; ?>
</div>

<?php
// Check if the user is already logged in
if (isset($_SESSION['id'])){
    header("Location: ../app/App.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    

    try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $dbconnect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Store user ID and first name in the session
            $_SESSION['id'] = $user['id']; 
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['role'] = $user['role'];

            // Successful login: redirect the user
                header("Location: ../app/App.php");
                exit();
        } else {
            echo "Invalid email or password.";
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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
    <title>SignIn</title>
</head>
<body class="bg-gray-100" >
            
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Sign In</h2>
            <form action="sign-in.php" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" />
                </div>
                <button type="submit"
                        class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition">
                    Sign In
                </button>
                <p class="mt-4 text-center text-sm text-gray-600">
                    You don’t have an account? Go  
                    <a href="../logs/sign-up.php" class="text-blue-500 hover:underline">Sign Up!</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
