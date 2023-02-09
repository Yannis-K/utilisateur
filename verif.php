<html>
 <head>
 <meta charset="utf-8">
 <title>Page de Connexion</title>
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body>
 <div id="container">

<?php
    


    $username = $_POST['username'];
    $password = $_POST['password'];
    
    include 'bdd.php'; 
    
    //requete pour verifier si l'utilisateur existe sur la bdd
    $sql = "SELECT * FROM user where username = '$username' and password ='".hash('sha256', $password)."'";
    
    
    $resultat = $newBD->prepare($sql);
    $resultat->execute();
    

    
    //si l'utilisateur est reconnu affichage d'un message d'autentification réussi
    if($resultat->rowCount() > 0){
        session_start();
        
            
            $_SESSION['username'] = $username;
            echo "<div class='add'>
            <h3 style='color:green'>Vous êtes connecter avec succès </h3>
            <p>En tant que : ".$_SESSION['username']."</p>
            </div>";
            echo "<p><a href='connexion.php'>Deconnexion</a></p>";
            
        }

       
    //sinon affichage d'un message d'erreur
    else{

        
        
        echo "<div class='add'>
        <h3 style='color:red'>Mauvais Identifiant ou Mot de passe ou <br>Vous n'êtes pas encore inscrit</h3>
        <p>Cliquez ici pour vous <a href='ajout-utilisateur.php'>Inscrire</a></p>
        </div>";


    }
    
    
        



?>

</div>
</body>
</html>