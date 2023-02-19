<?php
    // require_once "AutoLoad.php";
    require_once "./vendor/autoload.php";

    use Classes\Request;
    use Classes\Product;
    use Classes\GSComment;

    $request = new Request();
    var_dump($request->all());
    var_dump($request->input("name"));

    
    $product = new Product("Car", 10000, 10, "img", 1);
    $gscomment = new GSComment();
    $gscomment->setComments($product, "Good.");
    $gscomment->setComments($product, "Bad!");
    $gscomment->setComments($product, "Very Good.");

    $product2 = new Product("Car2", 20000, 20, "img", 2);
    $gscomment->setComments($product2, "Good2.");
    $gscomment->setComments($product2, "Bad2!");
    $gscomment->setComments($product2, "Very Good2.");

    var_dump($gscomment->getComments($product));
    var_dump($gscomment->getComments($product2));

    fn1();

?>