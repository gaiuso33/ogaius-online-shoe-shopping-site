<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars(trim($_POST['address']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Save to the database (example code)
    $pdo = new PDO('mysql:host=localhost;dbname=shop', 'username', 'password');
    $stmt = $pdo->prepare("INSERT INTO users (name, email, address, phone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $address, $phone, $password]);

    echo "User information collected and saved successfully!";
}
?>
 
 
 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    echo "Name: $name<br>";
    echo "Email: $email<br>";

    // Save data to database or handle as needed
}
?>
