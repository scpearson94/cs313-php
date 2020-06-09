<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Project 1 for CSE341</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<?php $currentPage = 'My Order'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Order Lookup</section>Chickens Galore</h1>
    </div>

    <div id="body-content">
    <h2>My Order</h2>

    </div>
    
    <?php include "footer.html"; ?>
    
</body>
</html>