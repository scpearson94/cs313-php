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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <!--<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
</head>
<?php $currentPage = 'Browse'; ?>
<body>
    <?php 

    class Product {
        private $name;
        private $price;
        private $quantity;
        private $product_id;

        function __construct($name, $price, $product_id, $image_url) {
            $this->name = $name;
            $this->price = $price;
            $this->product_id = $product_id;
            $this->image_url = $image_url;

            if (isset($_SESSION[$this->product_id])) {
                $this->quantity = $_SESSION[$this->product_id]->quantity;
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

        function get_product_id() {
            return $this->product_id;
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
        
        function addToCart($product_id) {
            $this->quantity += 1;
            $_SESSION[$this->product_id] = $this;
            echo "There are " . $_SESSION[$this->product_id]->quantity . " " . $_SESSION[$this->product_id]->name . " in your cart.";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $myPost = array_values($_POST);
        $productToAdd = $myPost[0];
        addToCart($productToAdd);
    }

    ?>
    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Karma Inc.</section>BROWSE</h1>
    </div>

    <h2>Current Inventory</h2>
    
    <form class="content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!--inventory table-->
        <div class="content">
            <?php 
                include "model.php"; 
                getBrowseList($db);
                displayBrowseList();
            ?>
        </div>
    </form>
    <section></section>

    <span class="fine-print"></span>

    <button onclick="window.location.href = 'cart.php';">View Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>