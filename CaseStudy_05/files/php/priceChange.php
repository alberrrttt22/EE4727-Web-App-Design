<? php @ $db = new mysqli('localhost', 'root', '', 'coffee_prices')

if (mysqli_connect_errno()){
    echo 'Error: Could not connect to database. Please try again later.';
    exit;
} 

$query = "CREATE TABLE IF NOT EXISTS coffee_prices (
    id INT PRIMARY KEY,
    coffee_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL);";

// Execute the query
if ($db->query($query) === TRUE) {
    echo "Table 'coffee_prices' created successfully or already exists.";
} else {
    echo "Error creating table: " . $db->error;
}

$success = true;

if (isset($_POST['java-pricing-single'])) {
    $javaPrice = $_POST['java-pricing-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('1', 'Java', $javaPrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}

if (isset($_POST['lait-pricing-single'])) {
    $laitSinglePrice = $_POST['lait-pricing-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('2', 'Lait Single', $laitSinglePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}
if (isset($_POST['lait-pricing-double'])) {
    $laitDoublePrice = $_POST['lait-pricing-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('3', 'Lait Double', $laitDoublePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}

if (isset($_POST['cap-pricing-single'])) {
    $capSinglePrice = $_POST['cap-pricing-single'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('4', 'Cap Single', $capSinglePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}
if (isset($_POST['cap-pricing-double'])) {
    $capDoublePrice = $_POST['cap-pricing-double'];
    $newQuery = "REPLACE INTO coffee_prices (id, coffee_name, price) VALUES ('5', 'Cap Double', $capDoublePrice)";
    $db->query($newQuery);
    if (!$db->query($newQuery)) {
        $success = false; // Set success to false if the query fails
    }
}

// Close the database connection
$db->close();

if ($success) {
    header("Location: ../admin_menu.php?success=1");
} else {
    header("Location: ../admin_menu.php?success=0");
}
exit;
?>