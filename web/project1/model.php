<?php
echo "no bug here model1!";
function getBrowseList () {
    foreach ($db->query('SELECT product_type_id, name, price, image_url FROM product') as $row)
    {
        echo "no bug here model2!";
        echo 'name: ' . $row['name'];
        echo ' price: ' . $row['price'];
        echo ' image_url: ' . $row['image_url'];
        echo ' product type id: ' . $row['product_type_id'];
        echo '<br/>';
    }


}
getBrowseList();
echo "no bug here model3!";
