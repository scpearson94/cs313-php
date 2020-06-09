<?php

function getBrowseList ($db) {
    $statement = $db->prepare("SELECT name, price, image_url FROM product");
    $statement->execute();
    $output = "";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        
        $product = new Product($row['name'], $row['price'], $row['image_url']);
        array_push($productArray, $product);

        $output .= "<div class='browse_item'><div class='image_container'>";
        $output .= "<img src='images/" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
        $output .= "</div><section class='image_descrip'><div class='item_name'>";
        $output .= $row['name'] . "</div><div class='item_price'>";
        $output .= $row['price'] . "</div></section><section><input type='submit' class='addToCartBtn' name='" . $row['name'] . "' value='Add to Cart'/></section></div>";

    }

    echo $output;
}