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

    <form action="" method="post">
        <ul>
            <li>
                <label for="titre_livre">Titre :</label>
                <input type="text" id="titre_livre" name="titre_livre" />
                <span style="color: red;">
                    <?= $erreurs['titre_livre'] ?? '' ?>
                </span>
            </li>
            <li>
                <label for="nombre_pages_livre">Nb Pages :</label>
                <input type="number" id="nombre_pages_livre" name="nombre_pages_livre"  />
                <span style="color: red;">
                    <?= $erreurs['nombre_pages_livre'] ?? '' ?>
                </span>
            </li>
            <li>
                <label for="auteur_livre">Auteur :</label>
                <input type="text" id="auteur_livre" name="auteur_livre"  />
                <span style="color: red;">
                    <?= $erreurs['auteur_livre'] ?? '' ?>
                </span>
            </li>
        </ul>
        <div class="button">
            <button type="submit">Envoyer le message</button>
        </div>

    </form>

</body>
</html>