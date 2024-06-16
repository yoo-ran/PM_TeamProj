<?php
require('db.php');

// Array of menu items
$menu_items = [
    // Hot Beverages
    ['name' => 'Caramel Macchiato', 'img' => './images/menu_caramelmacciato.jpg', 'price' => 5.00, 'is_merch' => 0],
    ['name' => 'Hot Chocolate', 'img' => './images/hotchocolate.jpg', 'price' => 4.50, 'is_merch' => 0],
    ['name' => 'Latte', 'img' => './images/menu_latte.jpg', 'price' => 5.00, 'is_merch' => 0],
    ['name' => 'Rose Latte', 'img' => './images/menu_roselatte.jpg', 'price' => 5.00, 'is_merch' => 0],
    ['name' => 'Brew Coffee', 'img' => './images/menu_brewcoffee.jpg', 'price' => 4.50, 'is_merch' => 0],
    ['name' => 'Espresso Shot', 'img' => './images/menu_espresso.jpg', 'price' => 3.75, 'is_merch' => 0],
    // Cold Beverages
    ['name' => 'Caramel Macchiato', 'img' => './images/menu_icecaramel.jpg', 'price' => 5.00, 'is_merch' => 0],
    ['name' => 'Hot Chocolate', 'img' => './images/menu_dalgona.jpg', 'price' => 6.25, 'is_merch' => 0],
    ['name' => 'Iced Latte', 'img' => './images/menu_icedlatte.jpg', 'price' => 4.75, 'is_merch' => 0],
    ['name' => 'Mocha Frappuccino', 'img' => './images/menu_frapuccino.jpg', 'price' => 6.25, 'is_merch' => 0],
    ['name' => 'Espresso Martini', 'img' => './images/menu_espressomartini.jpg', 'price' => 11.00, 'is_merch' => 0],
    ['name' => 'Affogato', 'img' => './images/menu_affogato.jpg', 'price' => 9.50, 'is_merch' => 0],
    // Food
    ['name' => 'Butter Croissant', 'img' => './images/menu_buttercroiassant.jpg', 'price' => 4.25, 'is_merch' => 1],
    ['name' => 'Almond Croissant', 'img' => './images/menu_almoncroiassant.jpg', 'price' => 4.75, 'is_merch' => 1],
    ['name' => 'Pain au Chocolat', 'img' => './images/menu_painau.jpg', 'price' => 4.75, 'is_merch' => 1],
    ['name' => 'Blueberry Muffin', 'img' => './images/menu_blueberrymuffin.jpg', 'price' => 3.50, 'is_merch' => 1],
    ['name' => 'Chocolate Brownie Squares', 'img' => './images/menu_brownie.jpg', 'price' => 3.50, 'is_merch' => 1],
    ['name' => 'Matcha Brownie Squares', 'img' => './images/menu_matchabrownie.jpg', 'price' => 3.50, 'is_merch' => 1],
    // At Home
    ['name' => 'Little Nap Coffee Beans - Brazil Roast', 'img' => './images/menu_littlenap.jpg', 'price' => 16.00, 'is_merch' => 1],
    ['name' => 'Blue Bottle Coffee Beans', 'img' => './images/menu_bluebottle.jpg', 'price' => 18.00, 'is_merch' => 1],
    ['name' => 'Onyx Coffee Beans', 'img' => './images/menu_onyx.jpg', 'price' => 18.00, 'is_merch' => 1],
    // Merchandise
    ['name' => '“Life Begins After Coffee” Mug', 'img' => './images/menu_mug.jpg', 'price' => 15.00, 'is_merch' => 1],
    ['name' => '24oz Stainless Steel Tumbler', 'img' => './images/menu_tumblur.jpeg', 'price' => 24.00, 'is_merch' => 1],
    ['name' => 'Bodum French Press', 'img' => './images/mennu_press.jpeg', 'price' => 35.00, 'is_merch' => 1],
];

// Insert menu items into the database
foreach ($menu_items as $item) {
    $name = $item['name'];
    $img = $item['img'];
    $price = $item['price'];
    $is_merch = $item['is_merch'];

    $query = "INSERT INTO `menu` (name, img, price, is_merch) VALUES ('$name', '$img', '$price', '$is_merch')";
    mysqli_query($connection, $query) or die(mysqli_error($connection));
}

echo "Menu items inserted successfully.";
?>
