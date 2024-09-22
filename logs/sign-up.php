<?php require "../config/database.php"?>

<?php 
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); 
    
        // Check if the user is already logged in
        if (isset($_SESSION['id'])) {
            header("Location: ../app/App.php");
            exit(); // Ensure no further code is executed
        }

        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
            $stmt = $dbconnect->prepare($sql);
    
            // Bind parameters
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
                header("Location: ../logs/sign-in.php");
                exit();
                // Optionally, redirect or display a success message
            } else {
                echo "Error: Unable to execute the query.";
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
    <div class="bg-blue-500">
        <?php include "../app/header.php";?>
    </div>     
        
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
            <form action="sign-up.php" method="POST">
                <div class="mb-4">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" />
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" />
                </div>
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
                    Sign Up
                </button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Already have an account? 
                <a href="../logs/sign-in.php" class="text-blue-500 hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</body>
</html>


