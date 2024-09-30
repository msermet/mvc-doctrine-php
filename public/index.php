<?php

// Récupérer l'EntityManager
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

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
        $livreController = new \App\Controllers\LivreController($entityManager);
        $livreController->list();
        break;
    case "livre-details" :
        $id_details = $_GET['id_details'] ?? null;
        if ($id_details) {
            $livreController = new \App\Controllers\LivreController($entityManager);
            $livreController->details($id_details);
        } else {
            echo "La requête n'est pas valide";
            break;
        }
        break;
    case "livre-creer" :
        $livreController = new \App\Controllers\LivreController($entityManager);
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