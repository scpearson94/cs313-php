<?php
/**********************************************************
* File: viewScriptures.php
* Author: Br. Burton
* 
* Description: This file shows an example of how to query a
*   PostgreSQL database from PHP.
***********************************************************/

    require "dbConnect.php";
    $db = get_db();

    //session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="styles.css">
    <!--<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
</head>
<?php $currentPage = 'Browse'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Karma Inc.</section>BROWSE</h1>
    </div>

    <div id="body-content">
    <h2>Current Inventory</h2>

    <p>So you want to buy a vowel?</p>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!--inventory table-->
        <?php 
            include "model.php"; 
            getBrowseList($db);
        ?>
    </form>
        <?php echo "no bug in browse!"; ?>

    <br>

    <span class="fine-print"></span>

    </div>

    <button onclick="window.location.href = 'cart.php';">View Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>