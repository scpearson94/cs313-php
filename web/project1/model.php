<?php

function getBrowseList ($db) {
    $query = "SELECT * FROM product";
    $statement = $db->prepare($query);
    $statement->execute();
    $output = "";
    $productArray = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $product_id = $row['id'];
        $product = new Product($name, $row['price'], $row['image_url'], $product_id);
        array_push($productArray[$product_id]);
        $productArray[$product_id] = $product;

        $output .= "<div class='browse_item'><div class='image_container'>";
        $output .= "<img src='images/" . $row['image_url'] . "' alt='" . $name . "'>";
        $output .= "</div><section class='image_descrip'><div class='item_name'>";
        $output .= $name . "</div><div class='item_price'>$";
        $output .= $row['price'] . "</div></section><section class='addToCartSct'><input type='submit' class='addToCartBtn' name='" . $product_id . "' value='Add to Cart'/></section></div>";

    }

    print_r($_SESSION);
    echo $output;

    return $productArray;
}