<?php

use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;

$app->get('/', function() {

  $products = Product::listAll();
  
  $page = new Page();

  $page->setTpl("index", [
   'products'=>Product::checkList($products)
 

  ]);

});

$app->get("/categories/:idcategory", function ($idcategory){
   

   $page = new 	Page();

   $category = new Category();
 
   $category->get((int)$idcategory);

   $page->setTpl("category", [
       'category'=>$category->getValues(),
       'products'=>Product::checkList($category->getProducts())

   ]);  

});



?>