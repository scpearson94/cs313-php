<?php

function getBrowseList ($db) {
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

function submitOrder ($db, $first_name, $last_name, $email, $address) {

    echo "1 ";
    $statement = $db->prepare("INSERT INTO customer (firstname, lastname, email, address) VALUES (:first_name, :last_name, :email, :address)");
    $statement->bindValue(':first_name', $first_name);
	$statement->bindValue(':last_name', $last_name);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':address', $address);
    $statement->execute();
    echo "2 ";
    $newId = $db->lastInsertId('customer_id_seq');
    echo "3 ";
    $statement = $db->prepare("INSERT INTO public.order (customer_id, shipping_type_id, amountpaid) VALUES ($newId, '4', '0.00')");
    $statement->execute();
    echo "4 ";
    $newId = $db->lastInsertId('order_id_seq');
    echo "5 ";
    foreach($_SESSION as $key => $product) {
        echo "6 ";
        $id = ltrim($product->get_product_id(), "_");
        $amount = $product->get_quantity();
        echo "7 ";
        $statement = $db->prepare("INSERT INTO cart (product_id, amount, order_id) VALUES (:id, :amount)");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':amount', $amount);
        $statement->execute();
        echo "8 ";
    }
    echo "9 ";

}