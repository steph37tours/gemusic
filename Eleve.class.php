<?php

class Eleve
{
    
    private $_id;
    private $_nom;
    private $_prenom;
    private $_adresse;
    private $_ville;
    private $_cp;
    private $_tel;
    
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
    
    public function id()
    {
        return $this->_id;
    }
    
    public function nom()
    {
        return $this->_nom;
    }
    
    public function prenom()
    {
        return $this->_prenom;
    }
    
    public function adresse()
    {
        return $this->_adresse;
    }
    
    public function ville()
    {
        return $this->_ville;
    }
    
    public function cp()
    {
        return $this->_cp;
    }
    
    public function tel()
    {
        return $this->_tel;
    }
    
    public function setId($id)
    {
        $id = (int) $id;
        
        if ($id >0)
        {
            $this->_id = $id;
        }
    }
    
    public function setNom($nom)
    {
        if(is_string($nom))
        {
            $this->_nom = $nom;
        }
    }
    
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->_prenom = $prenom;
        }
    }
    
    public function setAdresse($adresse)
    {
        if(is_string($adresse))
        {
            $this->_adresse = $adresse;
        }
    }
    
    public function setVille($ville)
    {
        if(is_string($ville))
        {
            $this->_ville = $ville;
        }
    }
    
    public function setCp($cp)
    {
        if(is_string($cp))
        {
            $this->_cp = $cp;
        }
    }
    
    public function setTel($tel)
    {
        if(is_string($tel))
        {
            $this->_tel = $tel;
        }
    }
    
    
}

?>

