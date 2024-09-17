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
    <?php foreach ($livres as $livre) : ?>
        <li><?=$livre->getTitre() ?></li>
    <?php endforeach; ?>
</ul>
<a href="index.php">Accueil</a>

</body>
</html>