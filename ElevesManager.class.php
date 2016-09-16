<?php

class ElevesManager
{
    private $db;
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
    public function add(Eleve $eleve)
    {
        $q = $this->_db->prepare('INSERT INTO ELEVE SET nom= :nom, prenom= :prenom, adresse= :adresse, ville= :ville, cp= :cp, tel= :tel');
       
        
        $q->bindValue(':nom', $eleve->nom());
        $q->bindValue(':prenom', $eleve->prenom());
        $q->bindValue(':adresse', $eleve->adresse());
        $q->bindValue(':ville', $eleve->ville());
        $q->bindValue(':cp', $eleve->cp());
        $q->bindValue(':tel', $eleve->tel());
        
        $q->execute();
        
    }
    
    public function delete(Eleve $eleve)
    {
        $this->_db->exec('DELETE FROM ELEVE WHERE id ='.$eleve->id());
      
    }
    
    public function get($info)
    {
        if(is_int($info))
        {
            $q = $this->_db->query('SELECT id,nom,prenom,adresse,ville,CP,tel from ELEVE where id ='.$info);
            
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new Eleve($donnees);
        }
    }
    
    public function getList()
    {
        $eleves = array();
        
        $q = $this->_db->query('SELECT id,nom,prenom,adresse,ville,CP,tel from ELEVE');
        
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $eleves[]= new Eleve($donnees);
        }
        
        return $eleves;
    }
    
    public function update(Eleve $eleve)
    {
        $q = $this->_db->prepare('UPDATE ELEVE SET nom = :nom, prenom = :prenom, adresse = :adresse, ville =:ville, cp = :cp, tel = :tel WHERE id = :id');
        
        $q->bindValue(':nom', $eleve->nom(),PDO::PARAM_STR);
        $q->bindValue(':prenom', $eleve->prenom(),PDO::PARAM_STR);
        $q->bindValue(':adresse', $eleve->adresse(),PDO::PARAM_STR);
        $q->bindValue(':ville', $eleve->ville(),PDO::PARAM_STR);
        $q->bindValue(':cp', $eleve->cp(),PDO::PARAM_STR);
        $q->bindValue(':tel', $eleve->tel(),PDO::PARAM_STR);
        $q->bindValue(':id', $eleve->id(), PDO::PARAM_INT);
        
        $q->execute();
        
    }
    
    public function getCours(Eleve $eleve)
    {
        $q = $this->_db->prepare('SELECT id_cours_annee, liste_bool_cours, annee_en_cours, date_inscription, id_eleve FROM COURSANNEE WHERE id_eleve = :id');
        
        $q->bindValue(':id', $eleve->id(), PDO::PARAM_INT);
        
        $q->execute();
         
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        if ($donnees!=FALSE)
        {
            return new Cours($donnees);
        }
        else
        {
            return (FALSE);
        }
        
       
    }
    
    public function setCours(Eleve $eleve, $liste_bool_cours)
    {
        $q = $this->_db->prepare('INSERT INTO COURSANNEE SET liste_bool_cours = :liste_bool_cours,  id_eleve = :id_eleve');
        
        $q->bindValue(':liste_bool_cours', $liste_bool_cours, PDO::PARAM_STR);
        //$q->bindValue(':date_inscription', $date_inscription, PDO::PARAM_INT);date_inscription = :date_inscription,
        $q->bindValue(':id_eleve', $eleve->id(), PDO::PARAM_INT);
        //$q->bindValue(':annee_en_cours', $annee_en_cours, PDO::PARAM_INT);annee_en_cours = :annee_en_cours,
        
        $q->execute();
    } 

    public function updateCours(Eleve $eleve, $liste_bool_cours)
    {
        $q = $this->_db->prepare('UPDATE COURSANNEE SET liste_bool_cours = :liste_bool_cours WHERE id_eleve = :id');
        
        $q->bindValue(':id', $eleve->id(), PDO::PARAM_INT);
        $q->bindValue(':liste_bool_cours', $liste_bool_cours, PDO::PARAM_STR);
        //$q->bindValue(':annee_en_cours', $annee_en_cours, PDO::PARAM_INT);
        
        $q->execute();
         
       
    }    
    
}

?>
