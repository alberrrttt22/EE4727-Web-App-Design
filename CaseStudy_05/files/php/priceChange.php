<?php
@ $db = new mysqli('localhost', 'root', '', 'javajam');

if (mysqli_connect_errno()){
    echo 'Error: Could not connect to database. Please try again later.';
    exit;
} 

$query = "CREATE TABLE IF NOT EXISTS coffee_prices (
    id INT PRIMARY KEY,
    coffee_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL);";

$success = true;

if (isset($_POST['java-price-single'])) {
    $javaPrice = $_POST['java-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('1', 'Java', $javaPrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}

if (isset($_POST['lait-price-single'])) {
    $laitSinglePrice = $_POST['lait-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('2', 'Cafe au Lait Single', $laitSinglePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}
if (isset($_POST['lait-price-double'])) {
    $laitDoublePrice = $_POST['lait-price-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('3', 'Cafe au Lait Double', $laitDoublePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}

if (isset($_POST['cap-price-single'])) {
    $capSinglePrice = $_POST['cap-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('4', 'Cappuccino Single', $capSinglePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}
if (isset($_POST['cap-price-double'])) {
    $capDoublePrice = $_POST['cap-price-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('5', 'Cappuccino Double', $capDoublePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}
echo("Values changed successfully. Click <a href=\"../../admin_menu.php\">admin</a> to go back.");

// Close the database connection
$db->close();

// if ($success) {
//     header("Location: ../admin_menu.php?success=1");
// } else {
//     header("Location: ../admin_menu.php?success=0");
// }
// exit;
?>