<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="storeStyles.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<?php $currentPage = 'Cart'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Karma Inc.</section>CHECKOUT</h1>
    </div>

    <div id="body-content">
    <h2>Checkout</h2>

    <p>Please enter your address for the purchase.</p>

    <form method="post" action="confirmationPage.php">
        Street: <input type='text' name='street'/>
        City: <input type='text' name='city'/>
        State: <input type='text' name='state'/>
        <input type='submit' name='purchase' value='Complete Purchase'/>
    </form>
    </div>

    <button onclick="window.location.href = 'cart.php';">Return to Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>