<script LANGUAGE="JavaScript">
    function confirmSubmit()
    {
        var agree=confirm("Are you sure you wish to delete that item?");
        if (agree)
            return true ;
        else
            return false ;
    }
</script>
<style type="text/css">
    .link-lookalike {
        background: none;
        border: none;
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
<html>
<body>
<?php
include 'methods.php';
$page_action = (!empty($_POST['delete']) ? $_POST['delete'] : array());
$products=getProducts();
for($x = 0;$x<count($page_action);$x++) {
    $products=deleteProduct($products,$page_action[$x]);
}
/*
if(!empty($_POST['delete'])){
    saveProducts($products);
}
*/
echo "<table>";
    foreach($products as $product){

        echo "<tr><th><img src=" . $product[4] . "></th>";
        echo "<th><form action='adminItem.php' method='post'><input type='hidden' name='id' value='$product[0]'><input type='submit' value='$product[1]' class='link-lookalike'/></form></th><th>$product[2]</th><th>$product[3]</th>" . '<th><form method="post"><input type = hidden name = delete[] value=' . $product[0] . "><Input type='submit' value='Delete' name='submit' onClick='return confirmSubmit()'></form></th></tr> \n";
    }

echo    ' </table>';

?>


</body>
</html>