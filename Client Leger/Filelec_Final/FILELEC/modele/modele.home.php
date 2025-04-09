<?php
    /*cette classe Modele permet l'interface avec la base de données.
    L'ensemble des rquetes sont exécutées ici.
    Le controleur demande l'exécution d'une rquete au Modele. Celui-ci lui réponden extraction des données ou injection des données dans les tables.
    */
    class Modele {
        private $unPdo ; //PDO : PHP DATA Object c'est une classe PHP librairie qui permet la connexion sécurisée à la base de données.

        public function __construct (){
            try {
                $serveur = "localhost";
                $bdd= "filelec";
                $user ="root";
                $mdp="";
                //instanciation de la classe PDO
                $this->unPdo= new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user, $mdp);
            }
            catch(PDOException $exp){
                echo "Erreur de connexion à la base de données.";
                echo $exp->getMessage (); //message officiel de l'erreur

            }
        }

        
    }