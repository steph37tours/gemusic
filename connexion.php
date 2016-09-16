	<?php

    
        
        define('USER1','root');
	define('PASS1','');
	define('DSN1','mysql:host=localhost;dbname=gemusic');
        
        
        
       
        //define('USER1','devtec_tours');
	//define('PASS1','jtmt0urs');
	//define('DSN1','mysql:host=mysql55-14.perso;dbname=devtec_tours');

        try
        {
                $pdo=new PDO(DSN1,USER1,PASS1);
        }
	catch (PDOException $e)
        {
                print "Erreur ! : " . $e->getMessage() . "<br/>";
                die();
        }

	?>
