<?php

session_start();

$flag = false;
if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST,"name", FILTER_UNSAFE_RAW); // to know if its string .. return true or false
    $price= filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);// to know if its number and its ok to have fraction .. return true or false
    $qtt=filter_input(INPUT_POST,"qtt", FILTER_VALIDATE_INT);// to know if its number int .. return true or false

    if($name && $price && $qtt){

        $product = [
            "name" => $name,
            "price"=>$price,
            "qtt"=>$qtt,
            "total"=>$price*$qtt
        ];

        $_SESSION['products'][]=$product;
        $flag = true;
    }


}

header("Location:index.php");

