<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ajout Produit</title>
</head>

<body>

    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=add" method="POST">
        <p>
            <label class="col-sm-2 col-form-label">
                Nom du produit :
                <input type="text" name="name" class="form-control">
            </label>
        </p>

        <p>
            <label class="col-sm-2 col-form-label">
                Prix du produit :
                <input type="number" step="any" name="price" class="form-control">
            </label>
        </p>
        <p>
            <label class="col-sm-2 col-form-label">
                Quantité désirée :
                <input type="number" name="qtt" value="1" class="form-control">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary">
        </p>

    </form>
    <button class="button" onclick="location.href='recap.php';"><span>Go To Products Page </span></button><br />
    <div>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];


            unset($_SESSION['message']);
        }


        ?>
    </div>
</body>

</html>