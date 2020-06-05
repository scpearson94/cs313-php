<?php
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
        <h1><section id="headerName">Karma Inc.</section>CART</h1>
    </div>

    <?php 

        class Letter {
            private $name;
            private $price;
            private $quantity;

            function __construct($name, $price) {
                $this->name = $name;
                $this->price = $price;

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

            function get_quantity() {
                return $this->quantity;
            }

            function get_total() {
                return $this->price * $this->quantity;
            }
            
            function subtractFromCart() {
                $this->quantity -= 1;
                if ($this->quantity == 0) {
                    unset($_SESSION[$this->name]);
                } else {
                    $_SESSION[$this->name] = $this;
                    echo "There are " . $_SESSION[$this->name]->quantity . " " . $_SESSION[$this->name]->name . " in your cart.";
                }
                echo $this->name . " was subtracted from your cart.";
            }

            function addToCart() {
                $this->quantity += 1;
                $_SESSION[$this->name] = $this;
                echo "There are " . $_SESSION[$this->name]->quantity . " " . $_SESSION[$this->name]->name . " in your cart.";
            }

            function removeFromCart() {
                $this->quantity = 0;
                unset($_SESSION[$this->name]);
                echo $this->name . " was removed from cart.";
            }
        }

        $letterA = new Letter("A", 200);
        $letterE = new Letter("E", 150);
        $letterI = new Letter("I", 500);
        $letterO = new Letter("O", 150);
        $letterU = new Letter("U", 325);
        $letterY = new Letter("Y", 1000);

        if(isset($_POST['A'])) { 
            $letterA->removeFromCart(); 
        }
        if(isset($_POST['E'])) { 
            $letterE->removeFromCart(); 
        } 
        if(isset($_POST['I'])) { 
            $letterI->removeFromCart(); 
        } 
        if(isset($_POST['O'])) { 
            $letterO->removeFromCart(); 
        } 
        if(isset($_POST['U'])) { 
            $letterU->removeFromCart(); 
        } 
        if(isset($_POST['Y'])) { 
            $letterY->removeFromCart(); 
        } 

        if(isset($_POST['subtractA'])) { 
            $letterA->subtractFromCart(); 
        }
        if(isset($_POST['subtractE'])) { 
            $letterE->subtractFromCart(); 
        } 
        if(isset($_POST['subtractI'])) { 
            $letterI->subtractFromCart(); 
        } 
        if(isset($_POST['subtractO'])) { 
            $letterO->subtractFromCart(); 
        } 
        if(isset($_POST['subtractU'])) { 
            $letterU->subtractFromCart(); 
        } 
        if(isset($_POST['subtractY'])) { 
            $letterY->subtractFromCart(); 
        } 

        if(isset($_POST['addA'])) { 
            $letterA->addToCart(); 
        }
        if(isset($_POST['addE'])) { 
            $letterE->addToCart(); 
        } 
        if(isset($_POST['addI'])) { 
            $letterI->addToCart(); 
        } 
        if(isset($_POST['addO'])) { 
            $letterO->addToCart(); 
        } 
        if(isset($_POST['addU'])) { 
            $letterU->addToCart(); 
        } 
        if(isset($_POST['addY'])) { 
            $letterY->addToCart(); 
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
            <th>Remove from Cart?</th>
        </tr>

        <?php
            $vowels = array("A","E","I","O","U","Y");
            $totalCost = 0;
            foreach($vowels as $vowel) {
                if (isset($_SESSION[$vowel])) {
                    echo 
                    "<tr> 
                        <td>The letter " . $vowel . "</td>
                        <td>$" . $_SESSION[$vowel]->get_price() . "</td> 
                        <td>" . $_SESSION[$vowel]->get_quantity() . "</td>
                        <td>$" . $_SESSION[$vowel]->get_total() . "</td>
                        <td>
                            <input type='submit' name='subtract" . $vowel . "' value='-'/>
                            <input type='submit' name='add" . $vowel . "' value='+'/>
                            <input type='submit' name='" . $vowel . "' value='Remove from Cart'/>
                        </td>
                    </tr>";
                    $totalCost += $_SESSION[$vowel]->get_total();
                }
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
    </form>

    </div>

    <button onclick="window.location.href = 'browse.php';">Keep Browsing</button>
    <button onclick="window.location.href = 'checkout.php';">Checkout</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>