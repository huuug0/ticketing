<?php

require_once 'Modele/ticket.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $ticket;

    public function __construct() {
        $this->ticket = new ticket();
    }

// Affiche la liste de tous les tickets du blog
    public function accueil() {
        $tickets = $this->ticket->gettickets();
        $vue = new Vue("Accueil");
        $vue->generer(array('tickets' => $tickets));
    }

}

