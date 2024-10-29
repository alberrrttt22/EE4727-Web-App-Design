<?php
// Show an alert message when price update is successful and redirect back to admin_menu page
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    echo "<script>alert('Prices updated successfully!');</script>";
    echo "<script>window.location.href = 'admin_menu.php';</script>";
    exit();
} else if (isset($_GET['message']) && $_GET['message'] === 'fail') {
    echo "<script>alert('No update was made');</script>";
    echo "<script>window.location.href = 'admin_menu.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>JavaJam Coffee House</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="files/css/stylesheet.css">
</head>
<body>
<header>
</header>
<div class="wrapper">
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <h1>Click to update product prices</h1>

        <?php
        // Connect to the database
        $db = new mysqli('localhost', 'root', '', 'javajam');

        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database. Please try again later.';
            exit;
        }
        // Create the table
        $query = "CREATE TABLE IF NOT EXISTS coffee_prices (
            id INT PRIMARY KEY,
            coffee_name VARCHAR(255) NOT NULL,
            price DECIMAL(10,2) NOT NULL);";
        
        // Execute the query
        $db->query($query);

        $newQuery = "INSERT INTO coffee_prices (id, coffee_name, price)
            SELECT 1, 'Just Java', 2.00
            WHERE NOT EXISTS (SELECT 1 FROM coffee_prices WHERE id = 1);";
        $db->query($newQuery);
        $newQuery = "INSERT INTO coffee_prices (id, coffee_name, price)
            SELECT 2, 'Cafe au Lait Single', 2.00
            WHERE NOT EXISTS (SELECT 1 FROM coffee_prices WHERE id = 2);";
        $db->query($newQuery);
        $newQuery = "INSERT INTO coffee_prices (id, coffee_name, price)
            SELECT 3, 'Cafe au Lait Double ', 3.00
            WHERE NOT EXISTS (SELECT 1 FROM coffee_prices WHERE id = 3);";
        $db->query($newQuery);
        $newQuery = "INSERT INTO coffee_prices (id, coffee_name, price)
            SELECT 4, 'Iced Cappuccino Single', 4.75
            WHERE NOT EXISTS (SELECT 1 FROM coffee_prices WHERE id = 4);";
        $db->query($newQuery);
        $newQuery = "INSERT INTO coffee_prices (id, coffee_name, price)
            SELECT 5, 'Iced Cappuccino Double', 5.75
            WHERE NOT EXISTS (SELECT 1 FROM coffee_prices WHERE id = 5);";
        $db->query($newQuery);
        
        // Fetch the prices from the database
        $javaPriceQuery = $db->query("SELECT price FROM coffee_prices WHERE id = 1");
        $javaPrice = $javaPriceQuery->fetch_assoc()['price'];

        $laitSinglePriceQuery = $db->query("SELECT price FROM coffee_prices WHERE id = 2");
        $laitSinglePrice = $laitSinglePriceQuery->fetch_assoc()['price'];

        $laitDoublePriceQuery = $db->query("SELECT price FROM coffee_prices WHERE id = 3");
        $laitDoublePrice = $laitDoublePriceQuery->fetch_assoc()['price'];

        $capSinglePriceQuery = $db->query("SELECT price FROM coffee_prices WHERE id = 4");
        $capSinglePrice = $capSinglePriceQuery->fetch_assoc()['price'];

        $capDoublePriceQuery = $db->query("SELECT price FROM coffee_prices WHERE id = 5");
        $capDoublePrice = $capDoublePriceQuery->fetch_assoc()['price'];

        // Close the database connection
        $db->close();
        ?>

        <form action="files/php/priceChange.php" method="POST">
        <table class="menu">
            <tr class="menu-item">
                <td class="drink">Just Java</td>
                <td class="description">
                    Regular house blend, decaffeinated coffee,
                    or flavor of the day.
                    <br>
                    <strong>Endless Cup $<span name="java-pricing" class="single"><?php echo number_format($javaPrice, 2); ?></span></strong>
                </td>
                <td><input type="checkbox" name="java-checkbox" class="checkbox"></td>
            </tr>

            <tr class="menu-item">
                <td class="drink">Cafe au Lait</td>
                <td class="description">
                    House blended coffee infused into a smooth
                    steamed milk.
                    <br>
                    <strong>Single $<span name="lait-pricing" class="single"><?php echo number_format($laitSinglePrice, 2); ?></span> 
                    Double $<span name="lait-pricing"><?php echo number_format($laitDoublePrice, 2); ?></span></strong>
                </td>
                <td><input type="checkbox" name="lait-checkbox" class="checkbox"></td>
            </tr>

            <tr class="menu-item">
                <td class="drink">Iced Cappuccino</td>
                <td class="description">
                    Sweetened espresso blended with icy-cold
                    milk and served in a
                    chilled glass.
                    <br>
                    <strong>Single $<span name="cap-pricing" class="single"><?php echo number_format($capSinglePrice, 2); ?></span> 
                    Double $<span name="cap-pricing"><?php echo number_format($capDoublePrice, 2); ?></span></strong>
                </td>
                <td><input type="checkbox" name="cap-checkbox" class="checkbox"></td>
            </tr>
        </table>
        <input id="submit" type="submit" value="Confirm">
        </form>
    </div>
</div>
<script type="text/javascript" src="files/scripts/AdminMenu.js"></script>
<footer>
    <br>Copyright &copy; 2014 JavaJam Coffee House
    <br> <a id="admin-menu" href="admin_menu.php">Admin</a> 
    <a id="daily-sales" href="dailySales.php">Daily Sales Report</a>
    <br> <a href=mailto:albert@zaw.com>albert@zaw.com</a> 
</footer>
</body>
</html>