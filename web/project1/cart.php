<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Sophia Pearson's Store for CSE341</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<?php $currentPage = 'Cart'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Cart</section>Chickens Galore</h1>
    </div>

    <?php 

        $validationMsg = "";

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

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keys = array_keys($_POST);
            $values = array_values($_POST);
            $myKey = $keys[0];
            $myValue = $values[0];
            $productToChange;
            $functionToCall = "";

            //set the product to change
            foreach($_SESSION as $key => $value) {
                if ($key == $myKey) {
                    $productToChange = $value;
                }
            }

            //set the function to call
            switch ($myValue) {
                case "-":
                    $functionToCall = "subtractFromCart";
                    break;
                case "+":
                    $functionToCall = "addToCart";
                    break;
                case "Remove from Cart":
                    $functionToCall = "removeFromCart";
                    break;
                default:
                    if (!empty($_SESSION)) { 
                        header("Location: checkout.php");
                    } else { 
                        $validationMsg = "Please add items to the cart before continuing to checkout.";
                    }
            }
            //change the product quantity
            if ($functionToCall != "") {
                $productToChange->$functionToCall();
            }
        }
    ?>

    <div id="body-content">
    <h2>Cart</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table style="width:100%">
        <tr>
            <th>Item</th>
            <th>Price</th> 
            <th>Quantity</th>
            <th>Total</th>
            <th>Edit item?</th>
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
                    <td>
                        <input type='submit' name='" . $product->get_product_id() . "' value='-'/>
                        <input type='submit' name='" . $product->get_product_id() . "' value='+'/>
                        <input type='submit' name='" . $product->get_product_id() . "' value='Remove from Cart'/>
                    </td>
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
            </tr>"
        ?>
    </table>
    
    <input type="submit" name="checkout" value="Checkout"/>

    </form>

    <button onclick="window.location.href = 'browse.php';">Keep Browsing</button>

    </div>

    <div id="validationMsg"><?php echo $validationMsg; ?></div>
    
    <?php include "footer.html"; ?>
    
</body>
</html>