<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>


    <?php
    
   
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }else{
        echo "<table class='table'>",
                "<thead>",
                   " <tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                       " <th>Total</th>",
                   " </tr>",
               " </thead>",
                "<tbody>";
                
        $totalGeneral=0;
        foreach($_SESSION['products'] as $index => $product){
           echo "<tr class='success'>",
                     "<td>".$index."</td>",
                    " <td>".$product['name']."</td>",
                    " <td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;£</td>",
                    " <td> <button  onclick='Sub()'>-</button> ".$product['qtt']." <button  onclick='Add()'>+</button></td>",
                    " <td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;£</td>",

                " </tr>";
                $totalGeneral+=$product['total'];
        }        
        echo "<tr class='danger'>",
        " <td colspan=4>Total général</td>",
        " <td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;£</strong></td>",
        
             "</tr>";
                
        echo     "</tbody>",
             "</table>";
    }
    
    // var_dump($_SESSION);
    
    function Add(){
        $ad = $_SESSION['products']['qtt']++;
       $_SESSION['products']['qtt']=$ad;

    }

    function Sub(){
        $su = $_SESSION['products']['qtt']--;
       $_SESSION['products']['qtt']=$su;

    }
    
    ?>

<button class="button" onclick="location.href='index.php';"><span>Go To Formulaire Page </span></button>
</body>
</html>