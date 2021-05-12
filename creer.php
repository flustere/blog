<?php

require('connexion.php');
require('recover.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validPOST("titreArticle")) {
        $sql = "INSERT INTO `article`
        (titreArticle, dateCreationArticle, statutArticle, idCategorie)
        VALUES (:titreArticle, CURDATE(), :statutArticle,
        (SELECT idCategorie FROM categorie WHERE nomCategorie = :nomCategorie))";
        // (SELECT idTag FROM tag WHERE nomTag = :nomTag));

        $stmt = $connexion->prepare($sql);
        $res = $stmt->execute([
            ":titreArticle"  => htmlspecialchars($_POST["titreArticle"]),
            "statutArticle" => htmlspecialchars($_POST["statutArticle"]),
            ":nomCategorie" => htmlspecialchars($_POST["nomCategorie"])
            // ":nomTag" => htmlspecialchars($_POST["nomTag"])
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
            <form method="POST">
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
                        <button type="submit" class="btn btn-light border">Publier</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-light border">Sauvegarder</button>
                    </div>
                </div>
            </table>

            <table>
                <div class="container justify-content border" style="height: 250px">
                    <div class="col-12 mt-2 ms-1">
                        <h5>Catégorie</h5>
                        <div class="mb-3">
                            <select class="form-select" for="invalidCheck" name="nomCategorie">
                                <option value="">Choisir...</option>
                                <option>Cake</option>
                                <option>Donuts</option>
                                <option>Macarons</option>
                                <option>Beu</option>
                            </select>
                        </div>
                        <h5>Tags</h5>
                        <div class="mb-3">
                            <select class="form-select" for="invalidCheck" name="nomTag">
                                <option value="">Choisir...</option>
                                <option>Baba</option>
                                <option>Ooh</option>
                                <option>Rhum</option>
                                <option>Labone</option>
                            </select>
                        </div>
                        <div class="position-relative">
                            <div class="position-absolute bottom-10 end-0">
                                <button type="submit" class="btn btn-light border">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>

            <table class="table table-bordered">
                <div class="container justify-content border mt-3" style="height: 100px;">
                    <h5>Statut Article<h5>
                            <div class="">
                                <select class="form-select" for="invalidCheck" name="statutArticle">
                                    <option value="">Choisir...</option>
                                    <option>Publié</option>
                                    <option>Brouillon</option>
                                    <option>Corbeille</option>
                                </select>
                            </div>
                </div>
            </table>

        </div>
        </form>

    </div>
</body>

</html>