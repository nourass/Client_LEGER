<?php
    require_once("modele/modele.class.php");
    class Controleur {
        /*le controleur realise les controles des données avan leur injections dans la BDD
        ou aprè leur extraction de la BDD. Il appelle le modèle pour réaliser les requetes. */
        private $unModele ; //instance de la classe Modele

        public function __construct (){
            //instanciation du Modele
            $this->unModele = new Modele();
        }

        public function insertClient($tab) {
            if (!empty($tab['prenom']) && !empty($tab['nom']) && !empty($tab['email']) &&
                !empty($tab['telephone']) && !empty($tab['type']) && !empty($tab['pays']) && !empty($tab['ville']) && !empty($tab['numero']) && !empty($tab['rue']) && !empty($tab['mdp'])) {
                // Appel au modèle pour l'insertion
                $this->unModele->insertClient($tab);
            } else {
                echo "Tous les champs doivent être remplis !";
            }
        }

        public function verifConnexion ($email,$mdp){
            //on applique la securité TP_auth
            $unUser = $this->unModele->verifConnexion ($email,$mdp);

            return $unUser;
        }

        public function deleteClient ($id_client){
            $this->unModele->deleteClient($id_client);
        }


       

        
        public function updateClient ($tab){

            $this->unModele->updateClient($tab);
        }

        public function ajouterAuPanier (){

            $this->unModele->ajouterAuPanier();
        }
    }

?>    