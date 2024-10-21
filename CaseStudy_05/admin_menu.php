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
        $db = new mysqli('localhost', 'root', '', 'coffee_prices');

        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database. Please try again later.';
            exit;
        }

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

        <form action="/php/priceChange.php" method="POST">
        <table class="menu">
            <tr class="menu-item">
                <td class="drink">Just Java</td>
                <td class="description">
                    Regular house blend, decaffeinated coffee,
                    or flavor of the day.
                    <br>
                    <strong>Endless Cup $<span name="java-pricing"><?php echo number_format($javaPrice, 2); ?></span></strong>
                </td>
                <td><input type="checkbox" name="java-checkbox" class="checkbox"></td>
            </tr>

            <tr class="menu-item">
                <td class="drink">Cafe au Lait</td>
                <td class="description">
                    House blended coffee infused into a smooth
                    steamed milk.
                    <br>
                    <strong>Single $<span name="lait-pricing"><?php echo number_format($laitSinglePrice, 2); ?></span> 
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
                    <strong>Single $<span name="cap-pricing"><?php echo number_format($capSinglePrice, 2); ?></span> 
                    Double $<span name="cap-pricing"><?php echo number_format($capDoublePrice, 2); ?></span></strong>
                </td>
                <td><input type="checkbox" name="cap-checkbox" class="checkbox"></td>
            </tr>
        </table>
        <input id="submit" type="submit" value="Submit">
        </form>
    </div>
</div>
<script type="text/javascript" src="files/scripts/AdminMenu.js"></script>
<footer>
    <br>Copyright &copy; 2014 JavaJam Coffee House
    <br> <a href=mailto:albert@zaw.com>albert@zaw.com</a>
    <br> <a id="admin-menu" href="admin_menu.html">Admin</a>    
</footer>
</body>
</html>