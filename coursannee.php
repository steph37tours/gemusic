

<br/>

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
 

echo"Liste des cours de l'édudiant ".$prenom." ".$nom; 

$cours = $manager->getCours($eleve);

if ($cours != FALSE)
{
    $liste_bool_cours = $cours->liste_bool_cours();
}


if (isset($_POST['case']))
{
    $valCase = $_POST['case'];

}

if (isset($_POST['Valider']))
{
    $nouv_liste_bool_cours ="";
    for($i=0;$i<40;$i++)
    {
    
        if(isset($valCase[$i]))
        {
            $nouv_liste_bool_cours = $nouv_liste_bool_cours."1";

        }
        else
        {
            $nouv_liste_bool_cours = $nouv_liste_bool_cours."0";
        }
         
    }

   
    $manager -> updateCours ($eleve, $nouv_liste_bool_cours);
           
    $liste_bool_cours = $nouv_liste_bool_cours;
}


?>




<form action="index.php?page=coursannee" method="post">

    <?php
    for ($i=0;$i<40;$i++)
    {
        //on voit si la case est cochée ou pas (booléen 1,0)
        if ($cours != FALSE)
        {
            $etatCoche = substr($liste_bool_cours, $i,1);
        }
        else 
        {
            $etatCoche = 0;
        }
        
        if($etatCoche=="0")
        {
            echo "<input type=\"checkbox\" name=\"case[".$i."]\" id=\"case[".$i."]\" value=\"".$i."\" /></td>";
        }
        else
        {
            echo "<input type=\"checkbox\" name=\"case[".$i."]\" id=\"case[".$i."]\" value=\"".$i."\" checked=\"checked\" /></td>";
        }
        
        echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
        
    }
    

    ?>
    
    <br/>
    <input type="submit" name="Valider" value="Valider">
</form>


