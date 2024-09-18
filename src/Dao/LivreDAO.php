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

    public function selectDetails(int $id_details) : ?Livre {
        $requete = $this->db->query("SELECT * FROM livre WHERE id_livre = $id_details");
        $livreDB = $requete->fetch(\PDO::FETCH_ASSOC);
        if (!$livreDB) {
            return null;
        }
        $livre = new Livre();   // Constructeur par défaut
        $livre->setId($livreDB['id_livre']);
        $livre->setTitre($livreDB['titre_livre']);
        $livre->setAuteur($livreDB['auteur_livre']);
        $livre->setNbPages($livreDB['nombre_pages_livre']); // Ici, les 5 lignes sont un mapping
        return $livre;

    }

    public function creerLivre($titre_livre, $nombre_pages_livre, $auteur_livre) {

            // Traiter les données
            // Traitement des données (insertion dans une base de données)
            $requete = $this->db->prepare("INSERT INTO livre (titre_livre,nombre_pages_livre,auteur_livre) VALUES (?,?,?)");
            $requete->bindParam(1, $titre_livre);
            $requete->bindParam(2, $nombre_pages_livre);
            $requete->bindParam(3, $auteur_livre);
            $requete->execute();
    }
}