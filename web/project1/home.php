<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Project 1 for CSE341</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<?php $currentPage = 'Home'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Home Page</section>Chickens Galore</h1>
    </div>

    <div id="body-content">
    <h2>Home</h2>

    <ul>
        <li><a href="browse.php">Browse inventory and add items to the cart</a></li>
        <li><a href="myOrder.php">Look up an order using the order confirmation number</a></li>
        <li><a href="cart.php">Continue to the cart to place an order</a></li>
    </ul>

    </div>
    
    <?php include "footer.html"; ?>
    
</body>
</html>