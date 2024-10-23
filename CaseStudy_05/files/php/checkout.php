<?php 
@ $db = new mysqli('localhost', 'root', '', 'javajam');

$init = ("CREATE TABLE IF NOT EXISTS customer_orders (
    num INT AUTO_INCREMENT,
    customer_order_id BIGINT,
    -- customer_order_id VARCHAR(255),
    id INT,
    price DECIMAL(10,2),
    quantity INT,
    subtotal DECIMAL(10,2),
    PRIMARY KEY (num)
    );"
);

$db->query($init);

$customerOrderID = date("YmdHis");
// session_start();
// if (!isset($_SESSION['session_id'])) {
//     $_SESSION['session_id'] = uniqid(); // Generate a unique session ID
// }
// $customerOrderID = $_SESSION['session_id'];

if ($_POST["java-single"]) {
    $javaSingle = $_POST["java-single"];
    $query = ("INSERT INTO customer_orders (customer_order_id, id, price, quantity, subtotal)
        SELECT $customerOrderID, id, price, $javaSingle, price*$javaSingle 
        FROM coffee_prices
        WHERE id = 1;"
    );
    $db->query($query);
}

if ($_POST["lait-single"]) {
    $laitSingle = $_POST["lait-single"];
    $query = ("INSERT INTO customer_orders (customer_order_id, id, price, quantity, subtotal)
        SELECT $customerOrderID, id, price, $laitSingle, price*$laitSingle 
        FROM coffee_prices
        WHERE id = 2;"
    );
    $db->query($query);
}

if ($_POST["lait-double"]) {
    $laitDouble = $_POST["lait-double"];
    $query = ("INSERT INTO customer_orders (customer_order_id, id, price, quantity, subtotal)
        SELECT $customerOrderID, id, price, $laitDouble, price*$laitDouble
        FROM coffee_prices
        WHERE id = 3;"
    );
    $db->query($query);
}

if ($_POST["cap-single"]) {
    $capSingle = $_POST["cap-single"];
    $query = ("INSERT INTO customer_orders (customer_order_id, id, price, quantity, subtotal)
        SELECT $customerOrderID, id, price, $capSingle, price*$capSingle 
        FROM coffee_prices
        WHERE id = 4;"
    );
    $db->query($query);
}

if ($_POST["cap-double"]) {
    $capDouble = $_POST["cap-double"];
    $query = ("INSERT INTO customer_orders (customer_order_id, id, price, quantity, subtotal)
        SELECT $customerOrderID, id, price, $capDouble, price*$capDouble
        FROM coffee_prices
        WHERE id = 5;"
    );
    $db->query($query);
}

$db->close();

header('Location: ../../menu.php?message=success');
exit();
?>
