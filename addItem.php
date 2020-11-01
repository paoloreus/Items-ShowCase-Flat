<?php
include 'methods.php';
$products = getProducts();
$product = array();
$product[] = $products[count($products)-1][0]+1;
$product[] = (!empty($_POST['title']) ? $_POST['title'] : '');
$product[] = (!empty($_POST['description']) ? $_POST['description'] : '');
$product[] = (!empty($_POST['price']) ? $_POST['price'] : '');
$product[] = 'default.jpg';
$product[] = (!empty($_POST['category']) ? $_POST['category'] : '');

if(!empty($_POST['submit'])) {
    if (isset($_FILES['upload']) && $_FILES['upload']['size'] > 0) {
        include 'upload.php';
        echo "<br>";
        if ($upload_info == 1) {
            $product[4] = basename($_FILES["upload"]["name"]);
        }
    }
    $products[]=$product;
    saveProducts($products);
    echo "Item was added<br><form action='adminItem.php' method='post'><input type='hidden' name='id' value='$product[0]'><input type='submit' value='Edit Item'/></form>";
    $product[0] = $products[count($products)-1][0]+1;
    $product[1] =  '';
    $product[2] = '';
    $product[3] = '';
    $product[4] = 'default.jpg';

}

echo "
<form method='post' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$product[0]'>
<label for='title'>Title:</label>
<input type='text' id='title' name='title' maxlength='100' required value ='$product[1]'><br>
<label for='description'>Description:</label>
<textarea id='description' name='description' rows= 5 cols = 51 required maxlength='255'>$product[2]</textarea><br>
<label for='price'>Price in cents:</label>
<input type='number' id='price' required min = 0 step = 1 name='price' value ='$product[3]'><br>
<label for='upload'>Upload New Image:</label>
<input type='file' name='upload' id='upload'><br>";

echo "<label for='category'>Add to category:</label>
<select name='category' id='category'>
";

foreach (getCategories() as $category) {
    echo "<option value='$category[1]'>$category[1]</option>";
}

echo "</select><br><input type='submit' value='submit' name='submit'></form>";