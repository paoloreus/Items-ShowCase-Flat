<html>
<body>
<?php
include 'methods.php';
$page_action = (!empty($_GET['delete']) ? $_GET['delete'] : array());
$products=getProducts();
for($x = 0;$x<count($page_action);$x++) {
    $products=deleteProduct($products,$page_action[$x]);
}
if(!empty($_GET['delete'])){
    saveProducts($products);
}
echo "<form><table>";
    foreach($products as $product){

        echo "<tr><th><img src=" . $product[4] . "></th>";
        echo "<th><a href>$product[1]</th><th>$product[2]</th><th>$product[3]</th>" . '<th>Delete<input type = checkbox name = delete[] value=' . $product[0] . "></th></tr> \n";
    }

echo    ' </form></table><input type="submit">';

?>


</body>
</html>