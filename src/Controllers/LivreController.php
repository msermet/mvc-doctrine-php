<?php

namespace App\Controllers;


// Récupérer l'EntityManager
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Livre;
use Doctrine\ORM\EntityManager;


class LivreController
{

    // Lister l'ensemble des livres

    public function list()
    {
        // Récupérer l'EntityManager
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         */
        $entityManager = require_once __DIR__.'/../../config/bootstrap.php';
        $livreRepository = $entityManager->getRepository(\App\Entity\Livre::class);
        $livres = $livreRepository->findAll();
        // Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/list.php';
    }

    public function details(int $id_details)
    {
        // Récupérer l'EntityManager
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         */
        $entityManager = require_once __DIR__.'/../../config/bootstrap.php';
        $livreRepository = $entityManager->getRepository(\App\Entity\Livre::class);
        $livre = $livreRepository->find($id_details);
        if ($livre) {
            require __DIR__ . '/../../views/livre/details.php';
        } else {
            //header("HTTP/1.0 404 Not Found");
            echo "Livre non trouvé";
        }
    }

    public function creer() {
        // Récupérer l'EntityManager
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         */
        $entityManager = require_once __DIR__.'/../../config/bootstrap.php';

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
                $livre = new Livre();
                $livre->setTitre($titre_livre);
                $livre->setAuteur($auteur_livre);
                $livre->setNbPages($nombre_pages_livre);
                $entityManager->persist($livre);
                $entityManager->flush();
                header("Location: /index.php");
                exit();
            }
        }

        require  __DIR__ . '/../../views/livre/formulaire.php';
    }
}