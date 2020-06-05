<?php

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
        
        function addToCart($name) {
            $this->quantity += 1;
            $_SESSION[$this->name] = $this;
            echo "There are " . $_SESSION[$this->name]->quantity . " " . $_SESSION[$this->name]->name . " in your cart.";
        }
    }



function getBrowseList ($db) {
    echo "now in get list function";
    $productArray = array();
    $statement = $db->prepare("SELECT name, price, image_url FROM product");
    $statement->execute();
    echo "statement is prepared";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $product = new Product($row['name'], $row['price'], $row['image_url']);
        array_push($productArray, $product);
    }
    echo "made it past the while loop";

    print($productArray);
    displayBrowseList($productArray);
}

function displayBrowseList ($productArray) {
    echo " now in display browse list";
    $output = "";

    foreach ($productArray as $product) {
        echo "in the foreach loop";
        $output .= "<div class='browse_item'><div class='image_container'>";
        $output .= "<img src='images/" . $product->image_url . "' alt='" . $product->name . "'>";
        $output .= "</div><section class='image_descrip'><div class='item_name'>";
        $output .= $product->name . "</div><div class='item_price'>$";
        $output .= $product->price . "</div></section>";
        $output .= "<input type='submit' class='addToCartBtn' name='" . $product->name . "' value='Add to Cart'/></div>";

    }

    print($productArray);
    echo $output;
}