<?php

class Client {

    protected $_id_client;
    protected $_nom;
    protected $_prenom;
    protected $_cp;
    protected $_localite;
    protected $_rue;
    protected $_num;
    protected $_tel;

    public function setAllData($_nom, $_prenom, $_cp, $_localite, $_rue, $_num, $_tel) {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_cp = $_cp;
        $this->_localite = $_localite;
        $this->_rue = $_rue;
        $this->_num = $_num;
        $this->_tel = $_tel;
    }

    public function get_id_client() {
        return $this->_id_client;
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function get_prenom() {
        return $this->_prenom;
    }

    public function get_cp() {
        return $this->_cp;
    }

    public function get_localite() {
        return $this->_localite;
    }

    public function get_rue() {
        return $this->_rue;
    }

    public function get_num() {
        return $this->_num;
    }

    public function get_tel() {
        return $this->_tel;
    }

    public function set_id_client($_id_client) {
        $this->_id_client = $_id_client;
    }

    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    public function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    public function set_cp($_cp) {
        $this->_cp = $_cp;
    }

    public function set_localite($_localite) {
        $this->_localite = $_localite;
    }

    public function set_rue($_rue) {
        $this->_rue = $_rue;
    }

    public function set_num($_num) {
        $this->_num = $_num;
    }

    public function set_tel($_tel) {
        $this->_tel = $_tel;
    }

}

?>