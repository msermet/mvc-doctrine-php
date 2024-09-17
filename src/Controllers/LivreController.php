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

    public function details()
    {

        $id_details = null;
        if (isset($_GET['id_details'])) {
            $id_details = filter_var($_GET['id_details'], FILTER_VALIDATE_INT);
            $livres = $this->livreDao->selectDetails($id_details);

            require __DIR__ . '/../../views/livre/details.php';
        }
    }
}