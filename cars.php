<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap
contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <!--<link rel="stylesheet" href="style.css"> -->
    <title>Cars For Fun</title>
    <!--<link rel="canonical"
href="https://getbootstrap.com/docs/4.5/examples/starter-template/"> -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css
" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/appletouch-
icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinnedtab.
svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
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
                    <a class="nav-link" href="?">Home <span class="sr-only">(
                            current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../app/login/loginHome.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="items.php">Items</a>
                </li>
                <!--<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" ariadisabled="
true">Disabled</a>
</li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="
false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="cars.php">Cars</a>
                        <a class="dropdown-item" href="phones.php">Phones</a>
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
    echo "<div style='padding: 80px;'><table>";

    foreach ($products as $product) {
        if ($product[5] == "cars") {
            echo "<tr><th><img src=" . $product[4] . "></th>";
            echo "<th><form action='adminItem.php' method='post'><input type='hidden' name='id' value='$product[0]'><p>$product[1]</p></form></th><th>$product[2]</th><th>$product[3]</th>" .
                '<th><form method="post"><input type = hidden name = delete[] value=' .
                $product[0] . ">
                </form></th></tr> \n";
        }
    }
    echo ' </table></div>';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.mi
n.js" integrity="sha384-
ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>