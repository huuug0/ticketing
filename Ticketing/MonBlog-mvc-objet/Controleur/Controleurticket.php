<?php

require_once 'Modele/ticket.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class Controleurticket {

    private $ticket;
    private $commentaire;

    public function __construct() {
        $this->ticket = new ticket();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un ticket
    public function ticket($idticket) {
        $ticket = $this->ticket->getticket($idticket);
        $commentaires = $this->commentaire->getCommentaires($idticket);
        $vue = new Vue("ticket");
        $vue->generer(array('ticket' => $ticket, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un ticket
    public function commenter($auteur, $contenu, $idticket) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idticket);
        // Actualisation de l'affichage du ticket
        $this->ticket($idticket);
    }

}

