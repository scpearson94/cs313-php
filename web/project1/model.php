<?php
echo "no bug here model1!";
function getBrowseList ($db) {
    echo "we made it to the model funtion";
    $statement = $db->prepare("SELECT name, price, image_url FROM product");
    echo "we made it past the statement declaratrion";
    $statement->execute();
    echo "we made it past the statement execution";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "no bug here model2!";
        echo 'name: ' . $row['name'];
        echo ' price: ' . $row['price'];
        //echo ' image_url: ' . $row['image_url'];
        //echo ' product type id: ' . $row['product_type_id'];
        echo '<br/>';
    }
    echo "no bug here model4!";
}

echo "no bug here model3!";
