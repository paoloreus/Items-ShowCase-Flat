<?php
include 'methods.php';
$id=(!empty($_GET['id']) ? $_GET['id'] : "p0");
$product = getProduct(getProducts(),$id);
$product[1]=(!empty($_GET['title']) ? $_GET['title'] : $product[1]);
$product[2]=(!empty($_GET['description']) ? $_GET['description'] : $product[2]);
$product[3]=(!empty($_GET['price']) ? $_GET['price'] : $product[3]);
$product[4]=(!empty($_GET['image']) ? $_GET['image'] : $product[4]);
$delete_action = (!empty($_GET['delete']) ? $_GET['delete'] : array());
$newCategory = (!empty($_GET['category']) ? $_GET['category'] : '');

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

} else {
    echo "All items must belong to at least 1 category";
}

echo "<form>
<input type='hidden' name='id' value='$product[0]'>
<label for='title'>Title:</label>
<input type='text' id='title' name='title' maxlength='100' value ='$product[1]'><br>
<label for='description'>Description:</label>
<input type='text' id='description' name='description' maxlength='255' value ='$product[2]'><br>
<label for='price'>Price in cents:</label>
<input type='number' id='price' min = 0 step = 1 name='price' value ='$product[3]'><br>
<label for='image'>Image Name:</label>
<input type='text' id='image' name='image' value ='$product[4]'><br>\n";


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

echo "</select><br><input type='submit' value='Submit'></form>";