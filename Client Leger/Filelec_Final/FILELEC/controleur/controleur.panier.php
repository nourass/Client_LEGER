<?php
require_once("modele/modele.panier.php");
class ControleurPanier
{
    /*le controleur realise les controles des données avan leur injections dans la BDD
    ou aprè leur extraction de la BDD. Il appelle le modèle pour réaliser les requetes. */
    private $unModele; //instance de la classe Modele

    public function __construct()
    {
        //instanciation du Modele
        $this->unModele = new ModelePanier();
    }



    public function getPanierClient($id_client)
    {

        return $this->unModele->getPanierClient($id_client);


    }


    public function deletePanierClient($id_article)
    {

        return $this->unModele->deletePanierClient($id_article);


    }



}