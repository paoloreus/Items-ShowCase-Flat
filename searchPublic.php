<?php
echo "<table class='table table-hover'>";
$text_c = array();
$text = $_REQUEST['search'];

$info = file('../../app/items/products.csv'); //reading from file
for($i = 0; $i < count($info); $i++){
    $fields = explode(',' , $info[$i]);
    echo '<tr>';
    for($x = 0; $x < count($fields); $x++){ //in this loop we check if the search value is not empty and exists in any title or item description
        if( strlen($text) > 0 && strpos($fields[1], $text) !== false){
            if($x == 0){
                echo '<td><img src="' . '../items/' . $fields[4] . '"> . </td>';
            }
            else if($x != 0 && $x != 4){
                echo '<td>' . $fields[$x] . '</td>';
            }

        }
//if a match result is existent then a list of items that match will appear for the user
        else if(strlen($text) > 0 && strpos($fields[2], $text) !== false){
            if($x == 0){
                echo '<td><img src="' . '../items/' . $fields[4] . '"> . </td>';
            }
            else if($x != 0 && $x != 4){
                echo '<td>' . $fields[$x] . '</td>';
            }
        }

    }


}
echo "</table>";
?>
<a href="../../public/index.php">HomePage</a>
