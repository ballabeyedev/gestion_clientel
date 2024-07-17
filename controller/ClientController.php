<?php

class ClientController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    //Ajouter Client
    public function AjouterClient($data) {
        // Vérifier si le client existe déjà avant d'ajouter
        if ($this->model->AjouterClient($data)) {
            return true;
        } else {
            return false;
        }
    }

    //Liste Clients
    public function GetAllClients() {
        return $this->model->GetAllClients();
    }

    //Modifier Client
    public function ModifierClient($id, $data) {
        $this->model->ModifierClient($id, $data);
        header('Location: ../client/modifsupp.php');
    }

    //Supprimer Client
    public function SupprimerClient($id) {
        $this->model->SupprimerClient($id);
    }
    
    public function deleteclient($id) {
        return $this->model->deleteclient($id);
    }
    
    //filtrer les clients par nom, adresse et numero
    //trier les clients par nom adresse, nmerero et statut
    public function TrierClients($criteres, $ordre) {
        return $this->model->TrierClients($criteres, $ordre);
    } 

    //bloquer et debloquer client
    public function bloquerdebloquerclient($clientId, $status) {
        return $this->model->bloquerdebloquerclient($clientId, $status);
        header('Location: ../view/bloquedeblo.php');
    }
}