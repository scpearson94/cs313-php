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

    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <!--<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
</head>
<?php $currentPage = 'Browse'; ?>
<body>
    <?php 

    $productArray = array();

    class Product {
        private $name;
        private $price;
        private $quantity;
        private $image_url;

        function __construct($name, $price, $image_url) {
            $this->name = $name;
            $this->price = $price;
            $this->image_url = $image_url;

            if (isset($_SESSION[$this->name])) {
                $this->quantity = $_SESSION[$this->name]->quantity;
            } else {
                $this->quantity = 0;
            }
        }

        function get_name() {
            return $this->name;
        }

        function get_price() {
            return $this->price;
        }

        function get_image_url() {
            return $this->image_url;
        }

        function get_quantity() {
            return $this->quantity;
        }

        function get_total() {
            return $this->price * $this->quantity;
        }
        
        function addToCart() {
            $this->quantity += 1;
            $_SESSION[$this->name] = $this;
            echo "alert('There are " . $_SESSION[$this->name]->quantity . " ". $_SESSION[$this->name]->name . " in your cart.');";
        }
    }

    ?>
    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Browse</section>Chickens Galore</h1>
    </div>

    <h2>Current Inventory</h2>
    
    <form class="content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!--inventory table-->
        <div class="content">
            <?php 
                include "model.php"; 
                $productArray = getBrowseList($db);
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $myPost = array_keys($_POST);
                    $productToAdd = $myPost[0];
                    $productArray[$productToAdd]->addToCart();
                }
            ?>
        </div>
    </form>

    <p class="clear"></p>

    <span class="fine-print"></span>

    <button onclick="window.location.href = 'cart.php';">View Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>