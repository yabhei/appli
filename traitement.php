<?php

session_start();

"<link rel=\"stylesheet\" href=\"style.css\">";

if (isset($_GET["action"])) {

    switch ($_GET["action"]) {
        case "add":
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, "name", FILTER_UNSAFE_RAW); // to know if its string .. return true or false
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // to know if its number and its ok to have fraction .. return true or false
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // to know if its number int .. return true or false

                if ($name && $price && $qtt && $price > 0 && $qtt > 0) {

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];

                    $_SESSION['products'][] = $product;


                    $_SESSION['message'] = "<p class=success style=\"color:white;\">Added successfully</p>";
                    header("Location:index.php");



                    break;
                } else {
                    $_SESSION['message'] = "<p class=error style=\"color:white;\">Error : Add field</p>";

                    header("Location:index.php");
                    break;
                }
            }

        case "delete":

            unset($_SESSION['products'][$_GET['id']]);
            header("Location:recap.php");
            break;

        case "clear":
            unset($_SESSION['products']);
            header("Location:recap.php");
            break;

        case "down_qtt":
            if ($_SESSION['products'][$_GET['id']]['qtt'] != 0) {
                $_SESSION['products'][$_GET['id']]['qtt']--;
                header("Location:recap.php");
                break;
            } else {
                unset($_SESSION['products'][$_GET['id']]);
                header("Location:recap.php");
                break;
            }

        case "up_qtt":
            $_SESSION['products'][$_GET['id']]['qtt']++;
            header("Location:recap.php");
            break;
    }
}
// header("Location:index.php");
