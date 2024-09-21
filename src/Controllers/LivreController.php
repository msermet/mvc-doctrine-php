<?php

namespace App\Controllers;

use App\Dao\LivreDAO;

class LivreController
{
    private LivreDAO $livreDao; // Dépendance

    public function __construct(LivreDAO $dao)
    {
        $this->livreDao = $dao;
    }

    // Lister l'ensemble des livres

    public function list()
    {
        // Fait appel au modèle afin de récupérer les données dans la BDD
        $livres = $this->livreDao->selectAll();

        // Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/list.php';
    }

    public function details(int $id_details)
    {
            $livre = $this->livreDao->selectDetails($id_details);
            if ($livre) {
                require __DIR__ . '/../../views/livre/details.php';
            } else {
                //header("HTTP/1.0 404 Not Found");
                echo "Livre non trouvé";
            }
    }

    public function creer() {
        $erreurs = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupération des données
            $titre_livre = $_POST['titre_livre'] ?? '';
            $nombre_pages_livre = $_POST['nombre_pages_livre'] ?? '';
            $auteur_livre = $_POST['auteur_livre'] ?? '';

            // Validation des données
            if (empty($titre_livre)) {
                $erreurs['titre_livre'] = "Le titre est obligatoire";
            }
            if (empty($nombre_pages_livre)) {
                $erreurs['nombre_pages_livre'] = "Le nombre de pages est obligatoire";
            }
            if (empty($auteur_livre)) {
                $erreurs['auteur_livre'] = "L'auteur est obligatoire";
            }

            // Si pas d'erreurs, créer le livre
            if (empty($erreurs)) {
                $this->livreDao->creerLivre($titre_livre, $nombre_pages_livre, $auteur_livre);
                header("Location: /index.php");
                exit();
            }
        }

        require  __DIR__ . '/../../views/livre/formulaire.php';
    }
}