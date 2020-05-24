<?php

function getBrowseList () {
    foreach ($db->query('SELECT name, price, image_url FROM product') as $row)
    {
    echo 'name: ' . $row['name'];
    echo ' price: ' . $row['price'];
    echo ' image_url: ' . $row['image_url'];
    echo ' product type id: ' . $row['product_type_id'];
    echo '<br/>';
    }
}

getBrowseList();