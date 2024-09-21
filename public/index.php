<?php

// Controller FRONTAL => Router
// Toutes les requêtes des utilisateurs passent par ce fichier

require_once __DIR__ . '/../vendor/autoload.php';

// Charger des variables d'environnement
$dotEnv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load(); // Charger les variables d'environnement de .env dans $_ENV

// Configurer la connexion à la base de données
$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",$_ENV['DB_USER'], $_ENV['DB_PASSWORD']);


// Mise en place du routing
$route = $_GET['route'] ?? 'accueil';
// Tester la valeur de $route
switch ($route) {
    case 'accueil' :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->accueil();
        break;
    case 'livre-list' :
        // $livreDao est une dépendance de LivreController
        $livreDao = new \App\Dao\LivreDAO($db);
        // Injecter la dépendance $livreDao dans l'objet LivreController
        $livreController = new \App\Controllers\LivreController($livreDao);
        $livreController->list();
        break;
    case "livre-details" :
        $id_details = $_GET['id_details'] ?? null;
        if ($id_details) {
            $livreDao = new \App\Dao\LivreDAO($db);
            $livreController = new \App\Controllers\LivreController($livreDao);
            $livreController->details($id_details);
        } else {
            echo "La requête n'est pas valide";
            break;
        }
        break;
    case "livre-creer" :
        $livreDao = new \App\Dao\LivreDAO($db);
        $livreController = new \App\Controllers\LivreController($livreDao);
        $livreController->creer();
        break;
    default :
        // Error 404
        echo "Page non trouvée";
        break;
}

//if ($route === "accueil") {
//    // Créer un objet AccueilController
//    $accueilController = new \App\Controllers\AccueilController();
//    $accueilController->accueil();
//} else {
//    echo "Page non trouvée";
//}