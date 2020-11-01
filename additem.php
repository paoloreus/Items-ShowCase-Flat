<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css
" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    form {
        margin: 80px;
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Welcome</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#
navbarsExampleDefault" aria-controls="navbarsExampleDefault" ariaexpanded="
false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?">Home <span class="sr-only">(
                        current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminitems.php">Items</a>
            </li>
            <!--<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" ariadisabled="
true">Disabled</a>
</li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="
false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="admin_cars.php">Cars</a>
                    <a class="dropdown-item" href="admin_phones.php">Phones</a>
                    <a class="dropdown-item" href="#">Clothing</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php
include 'methods.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (!empty($_POST['id']) ? $_POST['id'] : "p0");
    $product = getProduct(getProducts(), $id);
    $product[1] = (!empty($_POST['title']) ? $_POST['title'] : $product[1]);
    $product[2] = (!empty($_POST['description']) ? $_POST['description'] : $product[2]);
    $product[3] = (!empty($_POST['price']) ? $_POST['price'] : $product[3]);
    $product[4] = (!empty($_POST['image']) ? $_POST['image'] : $product[4]);
    $delete_action = (!empty($_POST['delete']) ? $_POST['delete'] : array());
    $newCategory = (!empty($_POST['category']) ? $_POST['category'] : '');
    $temp = $product;

    if ($newCategory != '') {
        for ($x = 5; $x < count($temp); $x++) {
            if ($temp[$x] == $newCategory) {
                $newCategory = '';
            }
        }
        if ($newCategory != '') {
            $temp[] = $newCategory;
        }
    }

    if (count($temp) >= 5) {
        $product = $temp;
        $products = getProducts();
        saveProducts($products, $product);
    } else {
        echo "All items must belong to at least 1 category";
    }
}
echo "<form action='additem.php' method='post'>
<input type='hidden' name='id'>
<label for='title'>Title:</label>
<input type='text' id='title' name='title' maxlength='100'><br>
<label for='description'>Description:</label>
<input type='text' id='description' name='description' maxlength='255'><br>
<label for='price'>Price in cents:</label>
<input type='number' id='price' min = 0 step = 1 name='price'><br>
<label for='image'>Image Name:</label>
<input type='text' id='image' name='image'><br>\n";

echo "<label for='category'>Add to category:</label>
<select name='category' id='category'>
<option></option>
";
foreach (getCategories() as $category) {
    echo "<option value='$category[1]'>$category[1]</option>";
}
echo "</select><br><input type='submit' value='Submit'></form>";
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.mi
n.js" integrity="sha384-
ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>