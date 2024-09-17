<?php

namespace App\Dao;

use App\Entity\Livre;

class LivreDAO
{
    private \PDO $db;

    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


    // Envoyer la requête "SELECT * FROM LIVRE"
    // Retourner les enregistrements sous la forme d'un tableau d'objets de la classe Livre
    public function selectAll() : array {

       $requete = $this->db->query("SELECT * FROM livre");
       $livresDB = $requete->fetchAll(\PDO::FETCH_ASSOC);
       // Mapping relationnel vers objet
        $livres = [];
        foreach ($livresDB as $livreDB) {
            $livre = new Livre();   // Constructeur par défaut
            $livre->setId($livreDB['id_livre']);
            $livre->setTitre($livreDB['titre_livre']);
            $livre->setAuteur($livreDB['auteur_livre']);
            $livre->setNbPages($livreDB['nombre_pages_livre']);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function selectDetails(int $id_livre) : array {
        $requete = $this->db->query("SELECT * FROM livre WHERE id_livre=$id_livre");
        $livreDB = $requete->fetchAll(\PDO::FETCH_ASSOC);
        $livres = [];
        $livre = new Livre();   // Constructeur par défaut
        $livre->setId($livreDB['id_livre']);
        $livre->setTitre($livreDB['titre_livre']);
        $livre->setAuteur($livreDB['auteur_livre']);
        $livre->setNbPages($livreDB['nombre_pages_livre']);
        $livres[] = $livre;
        return $livres;

    }
}