<?php

    $productArray = array();

    class Product {
        private $name;
        private $price;
        private $quantity;
        private $product_id;

        function __construct($name, $price, $product_id) {
            $this->name = $name;
            $this->price = $price;
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

        function get_product_id() {
            return $this->product_id;
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



function getBrowseList ($db) {
    $statement = $db->prepare("SELECT id, name, price, image_url FROM product");
    $statement->execute();
    $output = "";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $product = new Product($row['name'], $row['price'], $row['id'], $row['image_url']);
        array_push($productArray, $product);
    }

    echo $output;
}

function displayBrowseList () {
    $output = "";

    foreach ($productArray as $product) {

        $output .= "<div class='browse_item'><div class='image_container'>";
        $output .= "<img src='images/" . $product->image_url . "' alt='" . $product->name . "'>";
        $output .= "</div><section class='image_descrip'><div class='item_name'>";
        $output .= $product->name . "</div><div class='item_price'>$";
        $output .= $product->price . "</div></section>";
        $output .= "<input type='submit' class='addToCartBtn' name='" . $product->id . "' value='Add to Cart'/></div>";

    }

    echo $output;
}

function addToCart ($db) {
    $statement = $db->prepare("SELECT id, name, price, image_url FROM product WHERE id='" . $productToAdd . "'");
    $statement->execute();


}