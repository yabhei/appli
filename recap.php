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

    $count;
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";
    } else {
        echo "<table class='table'>",
        "<thead>",
        " <tr>",
        "<th>#</th>",
        "<th>Nom</th>",
        "<th>Prix</th>",
        "<th>Quantité</th>",
        " <th>Total</th>",
        " <th>Suprimer</th>",
        " </tr>",

        " </thead>",
        "<tbody>";

        $totalGeneral = 0;
        $count = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo "<tr class='success'>",
            "<td>" . $index . "</td>",
            " <td>" . $product['name'] . "</td>",
            " <td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;£</td>",
            " <td><a href=traitement.php?action=down_qtt&id=" . $index . "> <input id='plus' type='image' src='929430.png'></a>  " . $product['qtt'] . "<a href=traitement.php?action=up_qtt&id=" . $index . "   > <input id='plus' type='image' src='plus.png'></a></td>",
            " <td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;£</td>",
            "<td><a href=traitement.php?action=delete&id=" . $index . " style='font-size:3em;'> 🗑 </a></td>",

            " </tr>";
            $totalGeneral += $product['total'];
            $count += $product['qtt'];
        }
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];

            unset($_SESSION['message']);
        }
        echo "<tr class='danger'>",
        " <td colspan=3>Total général</td>",
        "  <td><strong>" . $count . " products</strong></td>",
        " <td colspan=1><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;£</strong></td>",
        "<td><a href='traitement.php?action=clear' style='font-size:3em;'> 🗑 </a></td>";

        // echo "<tr class='danger'>",
        // " <td colspan=4>Number of products </td>",
        // " <td><strong>" . $count . "</strong></td>",
        // "<td></td>",

        // "</tr>";

        echo     "</tbody>",
        "</table>";
    }



    ?>
    <button class="button" id="vid" onclick="location.href='index.php';"><span><a href="traitement.php?action=clear" style="color: aliceblue">Empty the table</a> </span></button><br />
    <button class="button" onclick="location.href='index.php';"><span>Go To Formulaire Page </span></button>
</body>

</html>