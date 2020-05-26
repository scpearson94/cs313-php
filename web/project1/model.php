<?php
echo "no bug here model1!";
function getBrowseList ($db) {
    echo "we made it to the model funtion";
    $stmt = $db->prepare("SELECT * FROM product WHERE price=:price AND name=:name");
    echo "we made it past the statement declaratrion";
    $stmt->execute(array(':name' => $name, ':price' => $price));
    echo "we made it past the statement execution";

    while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC))
    {
        echo "no bug here model2!";
        echo 'name: ' . $name;
        echo ' price: ' . $price;
        //echo ' image_url: ' . $row['image_url'];
        //echo ' product type id: ' . $row['product_type_id'];
        echo '<br/>';
    }
    echo "no bug here model4!";
}

echo "no bug here model3!";
