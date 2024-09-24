<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste livres</title>
</head>
<body>
<h1>Détails</h1>
<ul>
        <li>Titre du livre : <?= $livre->getTitre() ?></li>
        <li>Id du livre : <?= $livre->getId() ?></li>
        <li>Auteur du livre : <?= $livre->getAuteur() ?></li>
        <li>Nombres de pages : <?= $livre->getNbPages() ?></li>
</ul>
<a href="index.php?route=livre-list">Liste des livres</a>

</body>
</html>