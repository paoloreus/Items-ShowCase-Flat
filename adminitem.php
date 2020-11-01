<?php

include 'methods.php';
$id=(!empty($_POST['id']) ? $_POST['id'] : "0");
$products = getProducts();
$product = getProduct($products,$id);
if(isset($_FILES['upload'])  && $_FILES['upload']['size'] > 0){
    include 'upload.php';
    echo "<br>";
    if($upload_info == 1){
        if($product[4] != "default.jpg"){
            unlink("$name_dir"."$product[4]");
        }
        $product[4]=basename($_FILES["upload"]["name"]);
        saveProduct($products,$product);
    }
}
$product[1]=(!empty($_POST['title']) ? $_POST['title'] : $product[1]);
$product[2]=(!empty($_POST['description']) ? $_POST['description'] : $product[2]);
$product[3]=(!empty($_POST['price']) ? $_POST['price'] : $product[3]);
$delete_action = (!empty($_POST['delete']) ? $_POST['delete'] : array());
$newCategory = (!empty($_POST['category']) ? $_POST['category'] : '');

$temp=$product;
for($x = 0;$x<count($delete_action);$x++) {
    $temp=removeFromCategory($temp,$delete_action[$x]);
}

if($newCategory != ''){
    for($x=5;$x<count($temp);$x++) {
        if($temp[$x]==$newCategory){
            $newCategory = '';
        }
    }
    if($newCategory != ''){
        $temp[] = $newCategory;
    }
}

if(count($temp)>5){
   $product = $temp;
   if(!empty($_POST['submit'])){
       saveProduct($products,$product);
   }
} else {
    echo "All items must belong to at least 1 category<br>";
}

echo "Current Image:<br><img src='$product[4]'><br>
<form action='adminitem.php' method='post' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$product[0]'>
<label for='title'>Title:</label>
<input type='text' id='title' name='title' maxlength='100' value ='$product[1]'><br>
<label for='description'>Description:</label>
<textarea id='description' name='description' rows= 5 cols = 51 required maxlength='255'>$product[2]</textarea><br>
<label for='price'>Price in cents:</label>
<input type='number' id='price' min = 0 step = 1 name='price' value ='$product[3]'><br>
<label for='upload'>Upload New Image:</label>
<input type='file' name='upload' id='upload'><br>";


for($z=5;$z<count($product);$z++){
    echo "<label for='delete[]'>Remove from $product[$z] category</label>";
    echo "<input type = checkbox name = delete[] value='$product[$z]'";
    if(count($temp)<=5){
        for($y = 0;$y<count($delete_action);$y++) {
            if($delete_action[$y] == $product[$z]){
                echo " checked ";
            }
        }
    }
    echo "><br>\n";
}

echo "<label for='category'>Add to category:</label>
<select name='category' id='category'>
<option></option>
";

foreach(getCategories() as $category){
    echo "<option value='$category[1]'>$category[1]</option>";
}

echo "</select><br><input type='submit' value='submit' name='submit'></form>";