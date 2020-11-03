<?php
echo "<table class='table table-hover'>";
$text = $_REQUEST['search'];
$info = file('../../app/items/products.csv');
for($i = 0; $i < count($info); $i++){
    $fields = explode(',' , $info[$i]);
    echo '<tr>';
    for($x = 0; $x < count($fields); $x++){ //in this loop we check if text matches any keyword in either title or description
        if(strlen($text) > 0 && strpos($fields[1], $text) !== false){
            if($x == 0){
                echo '<td><img src="' . '../items/' . $fields[4] . '"> . </td>';
            }
            else if($x != 0 && $x != 4 && $x != 5){
                echo '<td>' . $fields[$x] . '</td>';
            }

            else if($x == 5){
                echo '<td>' . $fields[$x] . '</td>';
                echo "</p>";
                echo '<td> <a href="../../app/items/updateItem.php?act=update&id=' . $fields[0] . ' ">Update </td';
                echo '</tr>';
            }

        }
//if a match is found then a matching result will be displayed for admin to manage items

        else if(strlen($text) > 0 && strpos($fields[2], $text) !== false){
            if($x == 0){
                echo '<td><img src="' . '../items/' . $fields[4] . '"> . </td>';
            }
            else if($x != 0 && $x != 4){
                echo '<td>' . $fields[$x] . '</td>';
            }

            else if($x == 5){
                echo '<td>' . $fields[$x] . '</td>';
                echo "</p>";
                echo '<td> <a href="../../app/items/updateItem.php?act=update&id=' . $fields[0] . ' ">Update </td';
                echo '</tr>';
            }
        }

    }


}
echo "</table>";

?>
<br>
<a href="../login/adminView.php">Back to Homepage</a>
