<?php

include('connexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>BLOG</title>
</head>

<body>

    <div class="container">

        <div class="container d-flex justify-content-between">
            <h1>Créer un article</h1>
        </div>
        <div class="border">
            <form method="POST" action="index.php">
                <button type="submit" class="btn btn-light">Publier</button>
            </form>
            <form method="POST" action="modifier.php">
                <button type="submit" class="btn btn-light">Sauvegarder</button>
            </form>
        </div>


    </div>

</body>

</html>