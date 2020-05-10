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
<?php $currentPage = 'Browse'; ?>
<body>

    <div id="homeHeader">
        <?php include "heading.php"; ?>
        <h1><section id="headerName">Karma Inc.</section>BROWSE</h1>
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
            
            function addToCart() {
                //$_SESSION[$this->name]->quantity += 1;
                $this->quantity += 1;
                $_SESSION[$this->name] = $this;
                echo "There are " . $_SESSION[$this->name]->quantity . " " . $_SESSION[$this->name]->name . " in your cart.";
            }
        }

        $letterA = new Letter("A", 200);
        $letterE = new Letter("E", 150);
        $letterI = new Letter("I", 500);
        $letterO = new Letter("O", 150);
        $letterU = new Letter("U", 325);
        $letterY = new Letter("Y", 1000);

        if(isset($_POST['A'])) { 
            $letterA->addToCart(); 
        }
        if(isset($_POST['E'])) { 
            $letterE->addToCart(); 
        } 
        if(isset($_POST['I'])) { 
            $letterI->addToCart(); 
        } 
        if(isset($_POST['O'])) { 
            $letterO->addToCart(); 
        } 
        if(isset($_POST['U'])) { 
            $letterU->addToCart(); 
        } 
        if(isset($_POST['Y'])) { 
            $letterY->addToCart(); 
        } 

    ?>

    <div id="body-content">
    <h2>Current Inventory</h2>

    <p>So you want to buy a vowel?</p>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!--inventory table-->
    <table style="width:100%">
        <tr>
            <th>Item</th>
            <th>Description</th> 
            <th>Price</th>
            <th>Add to Cart?</th>
        </tr>
        <tr>
            <td>The letter 'A'</td>
            <td>With this great classic, you can build words such as "America." Isn't this handy?*</td> 
            <td>$200</td>
            <td><input type="submit" name="A" value="Add to Cart"/></td>
        </tr>
        <tr>
            <td>The letter 'E'</td>
            <td>Stop waiting for the next vocab list to come to come! Act now, and you can build words such as "Europe." You'll never need another!*</td> 
            <td>$150</td>
            <td><input type="submit" name="E" value="Add to Cart"/></td>
        </tr>
        <tr>
            <td>The letter 'I'</td>
            <td>Now available seven beautiful, self-serving sentences. Don't forget to include this item in your next trip to "India."*</td> 
            <td>$500</td>
            <td><input type="submit" name="I" value="Add to Cart"/></td>
        </tr>
        <tr>
            <td>The letter 'O'</td>
            <td>Oh my! This letter will make all of your friends jealous. Without it, you wouldn't be able to tell them about "Okinawa."*</td> 
            <td>$150</td>
            <td><input type="submit" name="O" value="Add to Cart"/></td>
        </tr>
        <tr>
            <td>The letter 'U'</td>
            <td>It's finally here! You've been waiting, and we've been working hard to bring you what you need to make "Uraguay." It's a travel must-have.*</td> 
            <td>$325</td>
            <td><input type="submit" name="U" value="Add to Cart"/></td>
        </tr>
        <tr>
            <td>The letter 'Y'</td>
            <td>Our most exclusive item!** You'll never believe the difference it makes to have words such as "Yakima" in your dictionary.*</td> 
            <td>$1000</td>
            <td><input type="submit" name="Y" value="Add to Cart"/></td>
        </tr>
    </table>
    </form>

    <br>

    <span class="fine-print">*Without a qualifying purchase, you can never use this letter again.</span>
    <span class="fine-print">**Only available for certain words.</span>

    </div>

    <button onclick="window.location.href = 'cart.php';">View Cart</button>
    
    <?php include "footer.html"; ?>
    
</body>
</html>