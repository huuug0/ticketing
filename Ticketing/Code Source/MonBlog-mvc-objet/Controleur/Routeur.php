<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/Controleurticket.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlticket;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlticket = new Controleurticket();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'ticket') {
                    $idticket = intval($this->getParametre($_GET, 'id'));
                    if ($idticket != 0) {
                        $this->ctrlticket->ticket($idticket);
                    }
                    else
                        throw new Exception("Identifiant de ticket non valide");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idticket = $this->getParametre($_POST, 'id');
                    $this->ctrlticket->commenter($auteur, $contenu, $idticket);
                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
