<?php

class admin {
    protected $id_admin;
    protected $nom_admin;
    protected $password;
    
    function setAllData($nom_admin, $password) {
        $this->nom_admin = $nom_admin;
        $this->password = $password;
    }
    
    public function getId_admin() {
        return $this->id_admin;
    }

    public function getNom_admin() {
        return $this->nom_admin;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }

    public function setNom_admin($nom_admin) {
        $this->nom_admin = $nom_admin;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
