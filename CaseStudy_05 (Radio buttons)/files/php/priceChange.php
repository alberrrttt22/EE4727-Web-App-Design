<?php
include 'connect.php';

$success = false;

if (isset($_POST['java-price-single'])) {
    $javaPrice = $_POST['java-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('1', 'Java', $javaPrice)";
    $db->query($newQuery);
    header("Location: ../../admin_menu.php?message=success");
    $success = true;
}

if (isset($_POST['lait-price-single'])) {
    $laitSinglePrice = $_POST['lait-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('2', 'Cafe au Lait Single', $laitSinglePrice)";
    $db->query($newQuery);
    header("Location: ../../admin_menu.php?message=success");
    $success = true;
}

if (isset($_POST['lait-price-double'])) {
    $laitDoublePrice = $_POST['lait-price-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('3', 'Cafe au Lait Double', $laitDoublePrice)";
    $db->query($newQuery);
    header("Location: ../../admin_menu.php?message=success");
    $success = true;
}

if (isset($_POST['cap-price-single'])) {
    $capSinglePrice = $_POST['cap-price-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('4', 'Cappuccino Single', $capSinglePrice)";
    $db->query($newQuery);
    header("Location: ../../admin_menu.php?message=success");
    $success = true;
}

if (isset($_POST['cap-price-double'])) {
    $capDoublePrice = $_POST['cap-price-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('5', 'Cappuccino Double', $capDoublePrice)";
    $db->query($newQuery);
    header("Location: ../../admin_menu.php?message=success");
    $success = true;
}

if (!$success){
    header('Location: ../../admin_menu.php?message=fail');
}
   
// Close the database connection
$db->close();
exit();

// if ($success) {
//     header("Location: ../admin_menu.php?success=1");
// } else {
//     header("Location: ../admin_menu.php?success=0");
// }
// exit;
?>