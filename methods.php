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

function saveProducts(array $products){
    $file = fopen('products.csv','wb');
    foreach($products as $product){
        fputcsv($file,$product);
    }
    fclose($file);
}

function deleteProduct(array $products,$pid){
    for($x = 0;$x<count($products);$x++) {
        if ($products[$x][0] == $pid) {
            array_splice($products,$x,1);
        }
    }
    return $products;
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

?>