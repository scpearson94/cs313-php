<?php
/**********************************************************
* File: browse.php
* Author: Sophia Pearson
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
    
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="styles.css">
    <!--<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
</head>
<?php $currentPage = 'Browse'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.html"; ?>
        <h1><section id="headerName">Karma Inc.</section>BROWSE</h1>
    </div>

    <h2>Current Inventory</h2>

    <p>So you want to buy a vowel?</p>
    
   <!--inventory table-->
    <div class="content">

        <div class="browse_item">
            <div class="image_container">
                <img src="images/ameraucana.jpg" alt="ameraucana">
            </div>
            <section class="image_descrip"><div class="item_name">Ameraucana</div>
                <div class="item_price">$3.35</div>
            </section>
        </div>
        <div class="browse_item">
            <div class="image_container">
                <img src="images/tube_feeder.jpg" alt="ameraucana">
            </div>
            <section class="image_descrip"><div class="item_name">Ameraucana</div>
                <div class="item_price">$3.35</div>
            </section>
        </div>
        <div class="browse_item">
            <div class="image_container">
                <img src="images/broiler.jpg" alt="ameraucana">
            </div>
            <section class="image_descrip"><div class="item_name">Ameraucana</div>
                <div class="item_price">$3.35</div>
            </section>
        </div>
    </div>


    <br>

    <span class="fine-print"></span>

    <button onclick="window.location.href = 'cart.php';">View Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>