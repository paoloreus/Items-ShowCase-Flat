<?php
function getCategories(){
    $file=fopen('categories.csv','rb');
    $categories = array();

    while(!feof($file)){

        $category =fgetcsv($file);

        if($category===false) {
            continue;
        }

        $categories[]=$category;
    }
    return $category;
}