<?php
    require "dbConnect.php";
    $db = get_db();
    $statement = $db->prepare("SELECT category FROM product_type");
    $statement->execute();
    $output = "";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $category = $row['category'];
        $output .=
        "<option value='" . $category . "'>" . $category . "</option>";
    }

    echo $output;