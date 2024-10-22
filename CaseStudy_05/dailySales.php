<!doctype html>
<html lang="en">
<head>
	<title>JavaJam Coffee House</title>
	<meta charset=“utf-8”>
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
		<h1>Click to generate daily sales report: </h1>
        <table>
        <tr class = "report">
            <td>Total dollar and quantity sales by products:</td>
            <td><input id="products" type="checkbox" class="checkbox"></td>
            <br>
        </tr>
        <tr id="product-report" class = "report" style="display:none;">
        <td colspan="2">
            <?php 
            include 'files/php/connect.php';
            $query = ("SELECT co.id, cp.coffee_name, SUM(co.quantity) AS total_quantity, SUM(co.subtotal) AS total_dollars
                FROM customer_orders co
                JOIN coffee_prices cp ON co.id = cp.id
                GROUP BY cp.coffee_name
                ORDER BY co.id ASC;"
                );
            
            $productSales = $db->query($query);

            if ($productSales && $productSales->num_rows > 0) {
                echo 
                "<table class=\"report-table\">
                <tr>
                    <th class=\"report-head\">Coffee Name</th>
                    <th class=\"report-head\">Total Quantity (\$)</th>
                    <th class=\"report-head\">Total Sales (\$)</th>
                </tr>";
                while ($row = $productSales->fetch_assoc()){
                    echo 
                    "<tr>
                        <td>{$row['coffee_name']}</td>
                        <td>{$row['total_quantity']}</td>
                        <td>{$row['total_dollars']}</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class=\"no-data-msg\">No sales data available</p>";
            };
            
            ?>
        </td>
        </tr>
        <tr class="report">
            <td>Total dollar and quantity sales by categories:</td>
            <td><input id="categories" type="checkbox" class="checkbox"></td>
            <br>
        </tr>
        <tr id="categories-report" class="report" style="display:none;">
            <td colspan="2">
            <?php
                include 'files/php/connect.php';
                $query = ("SELECT co.id,
                CASE
                    WHEN cp.coffee_name LIKE '%Single%' THEN 'Single'
                    WHEN cp.coffee_name LIKE '%Double%' THEN 'Double'
                    ELSE 'Just Java'
                END AS category,
                SUM(co.quantity) AS total_quantity, SUM(co.price) AS total_dollars
                FROM customer_orders co
                JOIN coffee_prices cp ON co.id = cp.id
                GROUP BY category
                ORDER BY co.id ASC;"
                );
                $categories = $db->query($query);
                
                if ($categories && $categories->num_rows > 0){
                    echo 
                    "<table class=\"report-table\">
                        <tr>
                            <th class=\"report-head\">Category</th>
                            <th class=\"report-head\">Total Quantity (\$)</th>
                            <th class=\"report-head\">Total Sales (\$)</th>
                        </tr>";
                    while ($row = $categories->fetch_assoc()){
                        echo
                        "<tr>
                            <td>{$row['category']}</td>
                            <td>{$row['total_quantity']}</td>
                            <td>{$row['total_dollars']}</td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class=\"no-data-msg\">No sales data available</p>";
                };
                ?>
            </td>
        </tr>
		<tr class="report">
            <td>Popular option of best selling product: 
                <div class="popular">
                <?php 
                include 'files/php/connect.php';

                $query = ("SELECT coffee_name,
                    CASE
                        WHEN cp.id = 1 THEN 'Just Java'
                        WHEN cp.id IN (2, 3) THEN 'Cafe au Lait' 
                        WHEN cp.id IN (4, 5) THEN 'Iced Cappuccino'
                    END AS coffee_type,
                    SUM(co.subtotal) AS total_subtotal
                FROM customer_orders co
                JOIN coffee_prices cp ON co.id = cp.id
                GROUP BY coffee_type, coffee_name -- Group by coffee_name important to sort the double and single categories within the coffee itself
                ORDER BY total_subtotal DESC;
            ");
        

                $popular = $db->query($query);

                // if ($popular) {
                //     // Fetch the result and display it in the table
                //     while ($row = $popular->fetch_assoc()) {
                //         echo "<table>";
                //         echo "<tr>";
                //         echo "<td>{$row['coffee_type']}</td>";
                //         echo "<td>\${$row['total_subtotal']}</td>";
                //         echo "<td>{$row['coffee_name']}</td>";
                //         echo "</tr>";
                //         echo "</table>";
                //     };
                // };


                if ($popular && $popular->num_rows > 0){
                    $row = $popular->fetch_assoc();

                    // Check if there is a result
                    if ($row) {
                        echo $row['coffee_name'];
                    } 
                } else{
                    echo "No sales data available";
                };
                
                $db->close();
                ?>
                </div>
            </td>
            
        </tr>
        </table>
	</div>
</div>
<script type="text/javascript" src="files/scripts/salesReport.js"></script>
<footer>
	<br>Copyright &copy; 2014 JavaJam Coffee House
	<br> <a id= "admin-menu" href="admin_menu.html">Admin</a>
    <a id="daily-sales" href="dailySales.php">Daily Sales Report</a>
    <br> <a href=mailto:albert@zaw.com>albert@zaw.com</a>	
</footer>
</body>
</html>