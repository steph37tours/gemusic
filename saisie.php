


<?php

$id="";

if (isset($_GET['page']))
{
    if($_GET['page']=="editer")
    {
        if (isset($_GET['id']))
        {
            $id=$_GET['id'];
            
            $manager = new ElevesManager($pdo);
            
            $eleve = $manager->get((int)$id);
            
            $nom = $eleve->nom();
            $prenom = $eleve->prenom();
            $adresse = $eleve->adresse();
            $ville = $eleve->ville();
            $cp = $eleve->cp();
            $tel = $eleve->tel();                    
            
        }
    }
}



?>


    <div>
        <br/><br/><br/><br/><br/>
        <form name="formEleve" action="index.php?page=saisie" method="post">
        <table>
            <tr>
                <td><label for="nom">Nom : </label></td>
                <td><input type="text" name="nom" id="nom" value="<?php if(isset($nom)) {echo $nom;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
            <tr>
                <td><label for="prenom">Prenom : </label></td>
                <td><input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse : </label></td>
                <td><input type="text" name="adresse" id="adresse" value="<?php if(isset($adresse)) {echo $adresse;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
            <tr>
                <td><label for="cp">CP : </label></td>
                <td><input type="text" name="cp" id="cp" value="<?php if(isset($cp)) {echo $cp;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
            <tr>
                <td><label for="ville">Ville : </label></td>
                <td><input type="text" name="ville" id="ville" value="<?php if(isset($ville)) {echo $ville;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
            <tr>
                <td><label for="tel">tel : </label></td>
                <td><input type="text" name="tel" id="tel" value="<?php if(isset($tel)) {echo $tel;} ?>" maxlength=120 size=30 /></td>
                <td><?php if(isset($messageIncorrect[0])) {echo $messageIncorrect[0];} ?></td>
            </tr>
        </table>
        
        
        <input type="hidden" name="id" value="<?php if(isset($id)) {echo $id;} ?>">
        <input type="submit" name="Envoyer" value="Envoyer">
       </form>
     
    </div>


<?php

!empty($_POST['nom']) ? $nom=$_POST['nom'] : $nom="";
!empty($_POST['prenom']) ? $prenom=$_POST['prenom'] : $prenom="";
!empty($_POST['adresse']) ? $adresse=$_POST['adresse'] : $adresse="";
!empty($_POST['ville']) ? $ville=$_POST['ville'] : $ville="";
!empty($_POST['cp']) ? $cp=$_POST['cp'] : $cp="";
!empty($_POST['tel']) ? $tel=$_POST['tel'] : $tel="";

!empty($_POST['id']) ? $id=$_POST['id'] : $id="";
//enregistrement des données transmises
if (isset($_POST['Envoyer']))
{
    $manager = new ElevesManager($pdo);

    if ($id!=""){
      
        $eleve = new Eleve(array(
        'id' => $id,    
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'ville' => $ville,
        'cp' => $cp,
        'tel' => $tel
            ));

        $manager->update($eleve);
        

    }  else {
        
        $eleve = new Eleve(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'ville' => $ville,
        'cp' => $cp,
        'tel' => $tel
            ));
                     
        $manager->add($eleve); 
    }
    

}

?>




