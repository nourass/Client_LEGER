<?php
    require_once("modele/modele.home.php");
    class Controleur {
        /*le controleur realise les controles des données avan leur injections dans la BDD
        ou aprè leur extraction de la BDD. Il appelle le modèle pour réaliser les requetes. */
        private $unHomeModele ; //instance de la classe Modele

        public function __construct (){
            //instanciation du Modele
            $this->unHomeModele = new Modele();
        }
    }