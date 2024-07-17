<?php
require_once('../../modele/SuperadminModel.php');

class SuperAdminController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getStats() {
        $numberOfAdmins = $this->model->getNumberOfAdmins();
        $numberOfClients = $this->model->getNumberOfClients();
        return [
            'numberOfAdmins' => $numberOfAdmins,
            'numberOfClients' => $numberOfClients
        ];
    }

    public function getAllAdmins() {
        return $this->model->getAllAdmins();
    }

    public function getAllClients() {
        return $this->model->getAllClients();
    }

    public function addAdmin($prenom, $nom, $adresse, $login_admin, $passwdAdmin) {
        return $this->model->addAdmin($prenom, $nom, $adresse, $login_admin, $passwdAdmin);
    }   
    
    public function getActivityLogs() {
        return $this->model->fetchActivityLogs();
    }

    public function deleteAdmin($id) {
        return $this->model->deleteAdmin($id);
    }
}
?>
