<?php

include('connexion.php');

$stmt = $connexion->prepare("SELECT titreArticle, dateCreationArticle, statutArticle, nomCategorie, nomTag
FROM article
LEFT JOIN categorie
ON article.idCategorie = categorie.idCategorie
LEFT JOIN appartenir
ON article.idArticle = appartenir.idArticle
LEFT JOIN tag
ON appartenir.idTag = tag.idTag");

$stmt->execute();
$articles = $stmt->fetchAll();


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

        <div class="container px-5 gx-5">
            <div class="container d-flex justify-content-between">
                <h1>Liste d'articles</h1>
                <form method="POST" action="creer.php">
                    <button type="submit" class="btn btn-light">+ Créer</button>
                </form>
            </div>
            <div class="container">
                <table class="table table-secondary table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date création</th>
                            <th>Statut</th>
                            <th>Catégorie</th>
                            <th>Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article) { ?>
                            <tr>
                                <td><?= $article["titreArticle"] ?></td>
                                <td><?= $article["dateCreationArticle"] ?></td>
                                <td><?= $article["statutArticle"] ?></td>
                                <td><?= $article["nomCategorie"] ?></td>
                                <td><?= $article["nomTag"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container px-5 gx-5">
            <table class="table table-bordered">
                <div class="container border">
                    <h3>Filter</h3>
                    <div class="col-12">
                        <div>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Brouillons
                            </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Publiés
                            </label>
                        </div>
                        <div><input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Supprimés
                            </label>
                        </div>
                    </div>
                </div>
            </table>

            <table>
                <div class="container border">
                    <h3>Par catégorie</h3>
                    <div class="col-12">
                        <div>
                            <select class="form-check-label" for="invalidCheck">
                                <option value="">Choisir...</option>
                            </select>
                        </div>
                        <h3>Par tag</h3>
                        <div>
                            <select class="form-check-label" for="invalidCheck">
                                <option value="">Choisir...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </table>
        </div>

    </div>
</body>

</html>