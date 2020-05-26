<?php
echo "no bug here model1!";
function getBrowseList () {
    $statement = $db->prepare("SELECT product_type_id, name, price, image_url FROM product");
    $statement->execute();
    if (isset($statement)) {
        echo "statement is set";
    } else {
        echo "statement is not set";
    }
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        echo "no bug here model2!";
        echo 'name: ' . $row['name'];
        echo ' price: ' . $row['price'];
        echo ' image_url: ' . $row['image_url'];
        echo ' product type id: ' . $row['product_type_id'];
        echo '<br/>';
    }
}

echo "no bug here model3!";
