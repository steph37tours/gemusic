<?php
include_once('connexion.php');
?>


    <div class="container">

      <div class="starter-template">
        <h1>GeMusic</h1>
        <p class="lead">Bienvenue sur le logiciel de gestion de Cours de Musique : <br> GeMusic.</p>
      </div>
        
        
            <?php
                //on charge le manager en créant un nouvel objet
                $manager = new ElevesManager($pdo);

                !empty($_GET['sql_query']) ? $commande=$_GET['sql_query'] : $commande="";
                !empty($_GET['id']) ? $id=$_GET['id'] : $id="";

                if ($commande!="" && $id!=""){
                    
                    switch($commande) {
                    case "SUPPRIMER":

                        $eleve = $manager->get((int)$id);
                        $manager->delete($eleve);                        
                        break;
                    
                    case "EDITION":
                        
                        break;
                    }
                    
                    
                }

                    

            ?>



        Voici la liste des étudiants
        <form action="index.php" method="post">
            <fieldset>

            <?php

            

            $liste = $manager->getList();


            echo "<table>";
            echo "<tr><th>Nom Prénom</th><th>adresse</th><th>Code Postal</th><th>ville</th><th>Tél.</th></tr>";
            foreach ($liste as $donnee => $value)
            {

                echo "<tr>";
                //echo "<td><input type=\"checkbox\" name=\"case\" id=\"case\" value=\"".$value->id()."\" /></td>";
                echo "<td><a href=\"index.php?page=editer&id=".$value->id()."\">";
                echo $value->nom()." ".$value->prenom()."</a></td><td>".$value->adresse()."</td><td>".$value->CP()."</td><td>".$value->ville()."</td><td>".$value->Tel()."</td>";
                echo "<td><a href=\"index.php?sql_query=SUPPRIMER&id=".$value->id()."\">supprimer</a></td>";
                echo "<td><a href=\"index.php?page=editer&id=".$value->id()."\">éditer</a></td>";
                echo "<td><a href=\"index.php?page=coursannee&id=".$value->id()."\">cours</a></td>";
                echo "<td><a href=\"index.php?page=inscription&id=".$value->id()."\">formule</a></td>";
                echo "</tr>";

            }
            echo "</table>";
            //Clore la requête préparée
            //$liste->closeCursor();
            //$liste = NULL;
            ?>

            
            </fieldset>
        </form>
    </div><!-- /.container -->
    

