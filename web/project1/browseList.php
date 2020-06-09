<?php

function getBrowseList () {
    
    $db = get_db();
    $statement = $db->prepare("SELECT product_type_id, name, price, image_url FROM product");
    $statement->execute();
    $output = "";
    $productArray = array();
    $product_index = 0;

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $product_id = "_" . ($product_index + 1);
        $product = new Product($name, $row['price'], $row['image_url'], $product_id);
        array_push($productArray, $product);

        $output .= "<div class='browse_item'><div class='image_container'>";
        $output .= "<img src='images/" . $row['image_url'] . "' alt='" . $name . "'>";
        $output .= "</div><section class='image_descrip'><div class='item_name'>";
        $output .= $name . "</div><div class='item_price'>$";
        $output .= $row['price'] . "</div></section><section class='addToCartSct'><input type='submit' class='addToCartBtn' name='" . $product_index . "' value='Add to Cart'/></section></div>";
    
        $product_index++;
    }

    echo $output;

    return $productArray;
}