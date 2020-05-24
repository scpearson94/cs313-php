function getBrowseList () {
    foreach ($db->query('SELECT name, price, image_url FROM product') as $row)
    {
    echo 'name: ' . $row['username'];
    echo ' price: ' . $row['password'];
    echo ' image_url: ' . $row['password'];
    echo '<br/>';
    }
}