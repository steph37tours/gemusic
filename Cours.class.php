<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cours
 *
 * @author stephane
 */
class Cours {
    private $_id_cours_annee;
    private $_annee_en_cours;
    private $_liste_bool_cours;
    private $_id_eleve;
    
    
    public function __construct(array $donnees)
    {
           $this->hydrate($donnees);
    }
    
    public function hydrate (array $donnees)
    {
        foreach($donnees as $key => $value )
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    //getter
    public function id_cours_annee()
    {
        return $this->_id_cours_annee;
    }
    
    public function annee_en_cours()
    {
        return $this->_annee_en_cours;
    }
    
    public function liste_bool_cours()
    {
        return $this->_liste_bool_cours;
    }

    public function date_inscription()
    {
        return $this->_liste_bool_cours;
    }    

    public function id_eleve()
    {
        return $this->_id_eleve;
    }
    
    //setter
    public function setId_cours_annee($id)
    {
        $id = (int) $id;
        
        if ($id >0)
        {
            $this->_id_cours_annee = $id;
        }
    }
    
    public function setAnnee_en_cours($annee_en_cours)
    {
        if(is_int($annee_en_cours))
        {
            $this->_annee_en_cours = $annee_en_cours;
        }
    }
    
    public function setListe_bool_cours($liste_bool_cours)
    {
        if(is_string($liste_bool_cours))
        {
            $this->_liste_bool_cours = $liste_bool_cours;
        }
    }
    
    public function setDate_inscription($date_inscription)
    {
        if(is_int($date_inscription))
        {
            $this->_date_inscription = $date_inscription;
        }
    }

    public function setId_eleve($id_eleve)
    {
        if(is_int($id_eleve))
        {
            $this->_id_eleve = $id_eleve;
        }    
    
    }
}