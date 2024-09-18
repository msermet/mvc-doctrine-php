<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre_livre = $_POST['titre_livre'];
    $nombre_pages_livre = $_POST['nombre_pages_livre'];
    $auteur_livre = $_POST['auteur_livre'];

//    //Validation des données
//    if (empty($titre_livre)) {
//        $erreurs['titre_livre'] = "Le titre est obligatoire";
//    }
//    if (empty($nombre_pages_livre)) {
//        $erreurs['nombre_pages_livre'] = "Le nombre de page est obligatoire";
//    }
//    if (empty($auteur_livre)) {
//        $erreurs['auteur_livre'] = "L'auteur est obligatoire";
//    }
//
    creerLivre($titre_livre,$nombre_pages_livre,$auteur_livre);
    // Rediriger l'utilisateur vers une autre page du site
    header("Location: /index.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création Livre</title>
</head>
<body>
    <h1>Création Livre</h1>

    <form action="/ma-page-de-traitement" method="post">
        <ul>
            <li>
                <label for="titre_livre">Titre :</label>
                <input type="text" id="titre_livre" name="titre_livre" />
            </li>
            <li>
                <label for="nombre_pages_livre">Nb Pages :</label>
                <input type="number" id="nombre_pages_livre" name="nombre_pages_livre"  />
            </li>
            <li>
                <label for="auteur_livre">Auteur :</label>
                <input type="text" id="nombre_pages_livre" name="nombre_pages_livre"  />
            </li>
        </ul>
        <div class="button">
            <button type="submit">Envoyer le message</button>
        </div>

    </form>

</body>
</html>