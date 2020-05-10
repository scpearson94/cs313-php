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
        echo $this->name . "removed from cart.";
    }
}

?>