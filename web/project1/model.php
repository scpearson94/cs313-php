<?php

function getBrowseList ($db) {
    $statement = $db->prepare("SELECT name, price, image_url FROM product");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo 'name: ' . $row['name'];
        echo ' price: ' . $row['price'];
        echo ' image_url: ' . $row['image_url'];
        echo '<br/>';
    }
}