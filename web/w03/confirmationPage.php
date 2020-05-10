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
        <h1><section id="headerName">Karma Inc.</section>CONFIRMATION</h1>
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

    ?>

    <div id="body-content">
    <h2>Confirmation Page</h2>

    <p>So you bought some vowels.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table style="width:100%">
        <tr>
            <th>Item</th>
            <th>Price</th> 
            <th>Quantity</th>
            <th>Total</th>
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
            </tr>";
        ?>
    </table>
    </form>

    <?php
        $street = "";
        $city = "";
        $state = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $street = htmlspecialchars($_POST['street']);
            $city = htmlspecialchars($_POST['city']);
            $state = htmlspecialchars($_POST['state']);
        }

        if (isset($_POST['street']) && isset($_POST['city']) && isset($_POST['state'])) {
            echo 
            "<section>Shipping Address</section>
            <section>Street: " . $street . "</section>
            <section>City: " . $city . "</section>
            <section>State: " . $state . "</section>";
        }

    ?>

    </div>

    <button onclick="window.location.href = 'browse.php';">Browse Some More</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>