<html>

<head>
    <script LANGUAGE="JavaScript">
        function confirmSubmit() {
            var agree = confirm("Are you sure you wish to delete that item?");
            if (agree)
                return true;
            else
                return false;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css
" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
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
                    <a class="nav-link" href="admin_dashboard.php">Home <span class="sr-only">(
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
    $page_action = (!empty($_POST['delete']) ? $_POST['delete'] : array());
    $products = getProducts();
    for ($x = 0; $x < count($page_action); $x++) {
        $products = deleteProduct($products, $page_action[$x]);
    }
    /*
if(!empty($_POST['delete'])){
saveProducts($products);
}
*/
    echo "<body style='margin: 80px;'><table>";
    foreach ($products as $product) {
        if ($product[5] == "cars") {
            echo "<tr><th><img src=" . $product[4] . "></th>";
            echo "<th><form action='adminItem.php' method='post'><input
type='hidden' name='id' value='$product[0]'><input type='submit'
value='$product[1]' class='linklookalike'/></
form></th><th>$product[2]</th><th>$product[3]</th>" .
                '<th><form method="post"><input type = hidden name = delete[] value=' .
                $product[0] . "><Input type='submit' value='Delete' name='submit'
onClick='return confirmSubmit()'></form></th></tr> \n";
        }
    }
    echo ' </table></body>';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.mi
n.js" integrity="sha384-
ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>