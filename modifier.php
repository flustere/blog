<?php

require('connexion.php');
require('recover.php');

if (!validGET("id")) {
    redirectTo("creer.php");
}
$id = $_GET["id"];
$errors = [];


// modifier
if (isset($_GET['id'])) {
    $idArticleToEdit = $_GET["id"];
    $stmt = $connexion->prepare("SELECT * from article WHERE idArticle = :idArticleToEdit;");
    $stmt->execute([
        ':idArticleToEdit' => $idArticleToEdit
    ]);
    $blogEdit = $stmt->fetchAll();
    //  print_r($blogEdit);

    // Récupérer les valeurs depuis la requête et les inserer dans les inputs
    $valueIdArticle = $blogEdit[0]['idArticle'];
    $valueTitre = $blogEdit[0]['titreArticle'];
    $valueArea = $blogEdit[0]['contenuArticle'];
    $valueToTestTemp = $blogEdit[0]['idCategorie'];
}

// session_start();
// if (empty($_SESSION['token'])) {
//     $_SESSION['token'] = bin2hex(random_bytes(32));
// }
// $token = $_SESSION['token'];


// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (isset($_POST["delete"])) {
//         // Check the CSRF token
//         if (validPOST("token") && hash_equals($token, $_POST['token'])) {
//             $stmt = $connexion->prepare("DELETE FROM blog WHERE id=?");
//             if ($stmt->execute([$id])) {
//                 redirectTo("index.php");
//             } else {
//                 $errors[] = "Une erreur est survenue lors de la suppression. Veuillez réessayer plus tard.";
//             }
//         } else {
//             $errors[] = "Mauvais token de connexion. Veuillez réessayer.";
//         }
//     } else if (isset($_POST["cancel"])) {
//         redirectTo("index.php");
//     } else {
//         $errors[] = "Action non supportée.";
//     }
// }

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
                <h1>Modifier un article</h1>
            </div>
            <form method="POST">
                <div class="mb-2">
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" id="" placeholder="Titre de l'article..." name="titreArticle">
                </div>
                <div class="mb-2">
                    <label for="" class="form-label"></label>
                    <textarea class="form-control" name="contenuArticle" id="" placeholder="Super contenu..." rows="18"></textarea>
                </div>
        </div>

        <div class="container" style="max-width:200px; margin-top: 80px">
            <table class="table table-bordered">
                <div class="container justify-content border" style="height: 120px;">
                    <div class="mt-2 mb-3">
                        <button type="submit" class="btn btn-light border">Publier</button>
                        <button type="button" class="btn btn-ligth">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
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
                            <select class="form-select" for="invalidCheck" name="idCategorie">
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