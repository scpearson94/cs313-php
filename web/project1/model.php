<?php

function getBrowseList ($db) {
    $statement = $db->prepare("SELECT name, price, image_url FROM product");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $output = "";
        $output .= "<img src='images/" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
        $output .= 'name: ' . $row['name'];
        $output .= ' price: ' . $row['price'];
        $output .= ' image_url: ' . $row['image_url'];
        $output .= '<br/>';

        echo $output;
    }
}