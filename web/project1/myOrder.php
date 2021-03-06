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

    <p>Please enter your order number. This number was given to you after you submitted your order.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type='text' name='myOrder'/>
        <input type='submit' class='orderLookupBtn' name='submit' value='Look Up Order'/>
    </form>

    </div>
    <table style="width:100%">
        <tr>
            <th>Item</th>
            <th>Price</th> 
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php
            if(isset($_POST['myOrder'])) {
                $myOrder = $_POST['myOrder'];
                include "model.php";
                lookUpOrder($myOrder);
            }
        ?>
    </table>
    
    <?php include "footer.html"; ?>
    
</body>
</html>