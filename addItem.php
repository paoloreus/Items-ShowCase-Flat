<?php
include '../login/header.php';
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
        include '../model/upload.php';
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
?>
</main></body><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>