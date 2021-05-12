<?php

require('connexion.php');
require('recover.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validPOST("titreArticle")) {
        $sql = "INSERT INTO `article`
        (titreArticle, dateCreationArticle, statutArticle, nomCategorie)
        VALUES (:titreArticle, CURDATE(), :statutArticle, `area`,
        (SELECT idCategorie, FROM categorie WHERE nomCategorie = :nomCategorie))";

        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            ":titreArticle"  => htmlspecialchars($_POST["titreArticle"]),
            "statutArticle" => htmlspecialchars($_POST["statutArticle"]),
            ":nomCategorie" => htmlspecialchars($_POST["nomCategorie"])
        ]);
        if ($res === true) {
            redirectTo("index.php");
        }
    }
}


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
    <div class="container d-flex">

        <div style="width: 800px;">
            <div class="container d-flex justify-content-between">
                <h1>Créer un article</h1>
            </div>
            <div class="mb-2">
                <label for="" class="form-label"></label>
                <input type="text" class="form-control" id="" placeholder="Titre de l'article..." name="titreArticle">
            </div>
            <div class="mb-2">
                <label for="" class="form-label"></label>
                <textarea class="form-control" id="" placeholder="Super contenu..." rows="18"></textarea>
            </div>
        </div>


        <div class="container" style="max-width:200px; margin-top: 80px">
            <table class="table table-bordered">
                <div class="container justify-content border" style="height: 120px;">
                    <div class="mt-2 mb-3">
                        <form method="POST" action="index.php">
                            <button type="submit" class="btn btn-light border">Publier</button>
                        </form>
                    </div>
                    <div>
                        <form method="POST" action="creer.php">
                            <button type="submit" class="btn btn-light border">Sauvegarder</button>
                        </form>
                    </div>

                </div>
            </table>

            <table>
                <div class="container justify-content border" style="height: 250px">
                    <div class="col-12 mt-2 ms-1">
                        <h5>Catégorie</h5>
                        <div class="mb-3">
                            <select class="form-select" for="invalidCheck">
                                <option value="">Choisir...</option>
                            </select>
                        </div>
                        <h5>Tags</h5>
                        <div class="mb-3">
                            <select class="form-select" for="invalidCheck">
                                <option value="">Choisir...</option>
                            </select>
                        </div>
                        <div class="position-relative">
                            <div class="position-absolute bottom-10 end-0">
                                <form method="POST" action="creer.php">
                                    <button type="submit" class="btn btn-light border">Valider</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </table>
        </div>

    </div>
</body>

</html>