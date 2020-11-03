<?php


function get($name, $def = '')//gets username
{
    return $_REQUEST['username'] ?? $def;
}

function getpw($password, $def = '')//gets old/already existent password
{
    return $_REQUEST['password'] ?? $def;
}

function getnewpw($newpassword, $def = '')//gets new password
{
    return $_REQUEST['newpassword'] ?? $def;
}

function check_access()//checks if user has logged in using sessions
{
    if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
        header('Location: loginHome.php?error=must log in');
    }
}

function check_accessView(){//checks if user has logged in and returns a boolean value
    if(isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in']){
        return true;
    }
    else {
        return false;
    }

}

function check_items(){//checks whether admin would like to view items or categories
  if(isset($_GET['action']) && $_GET['action'] == 'items'){
      include "../items/adminItems.php";
  }

  else if(isset($_GET['action']) && $_GET['action'] == 'categories'){
      //include "../categories/methods.php";
     get_categories();
  }
}

function check_categories(){//displays an admin version of items to be displayed based on categories

    if(isset($_GET['category'])) {
        if(check_accessView() == true) {
            include "../../app/items/methods.php";
            $page_action = (!empty($_POST['delete']) ? $_POST['delete'] : array());
            $products = getProducts();
            for ($x = 0; $x < count($page_action); $x++) {
                $products = deleteProduct($products, $page_action[$x]);
            }
        }
        /*
        if(!empty($_POST['delete'])){
        saveProducts($products);
        }
        */
        echo "<body style='margin: 80px;'><table>";
        foreach ($products as $product) {
            if ($product[5] == $_GET['category']) {
                echo "<tr><th><img src=" . '../items/' . $product[4] . "></th>";
                echo "<th><form action='../items/adminItem.php' method='post'><input
type='hidden' name='id' value='$product[0]'><input type='submit'
value='$product[1]' class='linklookalike'/></
form></th><th>$product[2]</th><th>$product[3]</th>" .
                    '<th><form method="post"><input type = hidden name = delete[] value=' .
                    $product[0] . "><Input type='submit' value='Delete' name='submit'
onClick='return confirmSubmit()'></form></th></tr> \n";
            }
        }
        echo ' </table></body>';
    }

}


function get_items(){  //returns available items
    $info = file('../app/items/products.csv');
    for($i = 0; $i < 5; $i++){
        $fields = explode(',' , $info[$i]);
        echo '<tr>';
        for($x = 0; $x < count($fields); $x++){
            if($x == 0){
                echo '<td><img src="'. '../app/items/' . $fields[4] .'"> . </td>';

            }
           else if($x != 0 && $x != 4) {
               echo '<td>' . $fields[$x] . '</td>';
           }
        }
    }
}

function get_itemCategory()//returns items based on category selected
{
    if (isset($_GET['category'])) {
        $info = file('../app/items/products.csv');
        for ($i = 0; $i < count($info); $i++) {
            $fields = explode(',', $info[$i]);
            echo '<tr>';
            for ($x = 0; $x < count($fields); $x++) {
                if ($_GET['category'] == $fields[5]) {
                    if ($x == 0) {
                        echo '<td><img src="' . '../app/items/' . $fields[4] . '"> . </td>';
                    } else if ($x != 0 && $x != 4) {
                        echo '<td>' . $fields[$x] . '</td>';
                    }

                }

            }
            }
        }

}

function get_categories(){//displays a list of categories specifically for admin to manage
    echo "<table class='table table-hover'>";
$cag = file('../../app/categories/categories.csv');
for($i = 0; $i < count($cag); $i++) {
    $fields = explode(',', $cag[$i]);
    echo '<tr>';
    for ($x = 0; $x < count($fields); $x++) {
        echo '<td>' . $fields[$x] . '</td>';
    }

    //echo '<td> <a href="../../app/categories/deleteCategory.php?act=delete&id=' . $fields[0] . ' ">Delete </td';
    echo '</p>';
    echo '<td> <a href="../../app/categories/updateCategory.php?act=update&id=' . $fields[0] . ' ">Update </td';
    echo '</tr>';
}
echo "</table>";

echo '<td> <a href="../../app/categories/addCategory.php?act=add&id=' . $fields[0] . '"> Add New Category </td>';
}


function print_categories(){ //returns a dropdown selection of already existent categories
include '../items/methods.php';
    echo "<label for='category'>Add to category:</label>
<select name='category' id='category'>
";

    foreach (getCategories() as $category) {
        echo "<option value='$category[1]'>$category[1]</option>";
    }

    echo "</select><br>";
}