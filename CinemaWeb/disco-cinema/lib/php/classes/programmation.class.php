<?php

class programmation {
    
    protected $_id_prog;
    protected $_pfilm;
    protected $_psalle;
    protected $_pseance;
    private $_attributs = array();
        
    public function __construct($data) {
        $this->hydrate($data);
    }
    
    public function hydrate(array $data){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
    }
   
    public function __get($nom) {
        if(isset($this->_attributs[$nom])) {
            return $this->_attributs[$nom];
        }
    }
    
    public function __set($nom,$valeur) {
        $this->_attributs[$nom] = $valeur;
    }
    
    /*
    protected $_id_prog;
    protected $_pfilm;
    protected $_psalle;
    protected $_pseance;
    
    function setAllData( $_pfilm, $_psalle, $_pseance) {
        $this->_pfilm = $_pfilm;
        $this->_psalle = $_psalle;
        $this->_pseance = $_pseance;
    }
    
    public function get_id_prog() {
        return $this->_id_prog;
    }

    public function get_pfilm() {
        return $this->_pfilm;
    }

    public function get_psalle() {
        return $this->_psalle;
    }

    public function get_pseance() {
        return $this->_pseance;
    }

    public function set_id_prog($_id_prog) {
        $this->_id_prog = $_id_prog;
    }

    public function set_pfilm($_pfilm) {
        $this->_pfilm = $_pfilm;
    }

    public function set_psalle($_psalle) {
        $this->_psalle = $_psalle;
    }

    public function set_pseance($_pseance) {
        $this->_pseance = $_pseance;
    }*/



}
