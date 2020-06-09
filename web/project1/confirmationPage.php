<?php

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
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<?php $currentPage = 'Cart'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Confirmation Page</section>Chickens Galore</h1>
    </div>

    <?php 

        class Product {
            private $name;
            private $price;
            private $quantity;
            private $image_url;
            private $product_id;

            function __construct($name, $price, $image_url, $product_id) {
                $this->name = $name;
                $this->price = $price;
                $this->image_url = $image_url;
                $this->product_id = $product_id;

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

            function get_image_url() {
                return $this->image_url;
            }

            function get_quantity() {
                return $this->quantity;
            }

            function get_product_id() {
                return $this->product_id;
            }

            function get_total() {
                return $this->price * $this->quantity;
            }
            
            function addToCart() {
                $this->quantity += 1;
                $_SESSION[$this->product_id] = $this;
                echo "<script>alert('" . $_SESSION[$this->product_id]->quantity . " ". $_SESSION[$this->product_id]->name . " in your cart.');</script>";
            }
                    
            function subtractFromCart() {
                $this->quantity -= 1;
                if ($this->quantity == 0) {
                    unset($_SESSION[$this->product_id]);
                } else {
                    $_SESSION[$this->product_id] = $this;
                }
                echo "<script>alert('1 ". $this->name . " was subtracted from your cart.');</script>";
            }

            function removeFromCart() {
                $this->quantity = 0;
                unset($_SESSION[$this->product_id]);
                echo "<script>alert('". $this->name . " was removed from cart.');</script>";
            }
        }

    ?>

    <div id="body-content">
    <h2>Confirmation Page</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table style="width:100%">
        <tr>
            <th>Item</th>
            <th>Price</th> 
            <th>Quantity</th>
            <th>Total</th>
        </tr>

        <?php
            $totalCost = 0;
            foreach($_SESSION as $key => $product) {
                echo 
                "<tr> 
                    <td>" . $product->get_name() . "</td>
                    <td>$" . $product->get_price() . "</td> 
                    <td>" . $product->get_quantity() . "</td>
                    <td>$" . $product->get_total() . "</td>
                </tr>";
                
                $totalCost += $product->get_total();
            }
            echo 
            "<tr>
                <td><b>Total Cost: </b></td>
                <td></td>
                <td></td>
                <td><b>$" . $totalCost . "</b></td>
                <td></td>
            </tr>";
        ?>
    </table>
    </form>

    <?php
        $first_name = "";
        $last_name = "";
        $email = "";
        $address = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['address'])) {
                $first_name = htmlspecialchars($_POST['first_name']);
                $last_name = htmlspecialchars($_POST['last_name']);
                $email = htmlspecialchars($_POST['email']);
                $address = htmlspecialchars($_POST['address']);

                echo
                "<section>Customer Information</section>
                <section>Name: " . $first_name . " " . $last_name . "</section>
                <section>Email: " . $email . "</section>
                <section>Address: " . $address . "</section>";

                include "model.php"; 
                $confNum = submitOrder($db, $first_name, $last_name, $email, $address);
                echo "<p>Order Confirmation Number: " . $confNum . "</p>";
                session_unset();
            }
        }

    ?>

    </div>

    <button onclick="window.location.href = 'browse.php';">Browse Some More</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>