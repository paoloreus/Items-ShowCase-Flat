<?php
function getProducts(){
    $file=fopen('products.csv','rb');
    $products = array();
    while(!feof($file)){
        $product =fgetcsv($file);
        if($product===false)continue;
        $products[]=$product;
    }
    return $products;
}

function getProduct(array $products,$pid){
    foreach($products as $product){
        if($product[0]==$pid){
            return $product;
        }
    }
    return array();
}

function saveProducts(array $products){
    $file = fopen('products.csv','wb');
    foreach($products as $product){
        fputcsv($file,$product);
    }
    fclose($file);
}

function saveProduct(array $products,array $product){
    for($x = 0;$x<count($products);$x++) {
        if ($products[$x][0] == $product[0]) {
            $products[$x] == $product;
        }
    }
    saveProducts($products);
}

function deleteProduct(array $products,$pid){
    for($x = 0;$x<count($products);$x++) {
        if ($products[$x][0] == $pid) {
            array_splice($products,$x,1);
        }
    }
    return $products;
}

function removeFromCategory(array $product,$category){
    for($x=5;$x<count($product);$x++){
        if($product[$x]==$category){
            array_splice($product,$x,1);
        }
    }
    return $product;
}

function allInCategory(array $products,$category) {
    $categories = array();
    for($x = 0;$x<count($products);$x++) {
        for($y=5;$y<count($products[$x]);$y++)
        if ($products[$x][$y] == $category) {
            $categories[] = $products[$x];
        }
    }
    return $categories;
}

function getCategories()
{
    $file = fopen('categories.csv', 'rb');
    $categories = array();

    while (!feof($file)) {

        $category = fgetcsv($file);

        if ($category === false) {
            continue;
        }

        $categories[] = $category;
    }
    return $categories;
}

?>