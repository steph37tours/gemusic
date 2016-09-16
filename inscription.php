
<br />



<?php

    if (isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];

        $manager = new ElevesManager($pdo);

        $eleve = $manager->get((int)$id);

        $nom = $eleve->nom();
        $prenom = $eleve->prenom();
        $adresse = $eleve->adresse();
        $ville = $eleve->ville();
        $cp = $eleve->cp();
        $tel = $eleve->tel();                    

    }

    echo "<p>Formule choisie et inscription pour l'élève ".$prenom." ".$nom."</p>";
    
    $cours = $manager->getCours($eleve);
    


if ($cours != FALSE)
{
    $liste_bool_cours = $cours->liste_bool_cours();
}
 else 
{
     echo "Cet élève n'est pas encore inscrit.";
}

?>

<form action="index.php?page=inscription" method="post">

    <p>annee</p>

    <p><input type="checkbox" name="case" id="case" value="nombre" />cours programmé</p>
    
    <p>quantité : <input type="text" name="quantite" id="quantite" value="<?php if(isset($quantite)) {echo $quantite;} ?>" maxlength=4 size=30 /></p>
    
    <p><input type="checkbox" name="case" id="case" value="carte" />Cours à la carte</p>
    
<?php
    echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
    
?>
    
    <br/>
    <input type="submit" name="Valider" value="Valider">
</form>
