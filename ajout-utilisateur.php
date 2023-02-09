<html>
 <head>
 <meta charset="utf-8">
 <title>Page de Création de compte</title>
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body>
 <img src="logo.jpg" height="20%" width="25%"/>

 <div id="container">
 
 
 
 <?php

 include 'bdd.php';  

//verification si les champs du formulaire sont remplie

 if(isset($_REQUEST['username'],
    $_REQUEST['email'],
    $_REQUEST['password'])){


    //récupération des champs du formulaire sans "\"
        
    $username = stripslashes($_REQUEST['username']);
    
    $email = stripslashes($_REQUEST['email']);
    
    $password = stripslashes($_REQUEST['password']);

    //requête pour verifier si l'email existe déjà dans la base 

    $sql = "SELECT COUNT(*) FROM user WHERE email = '$email' OR username = '$username'";
    $result = $newBD->prepare($sql);
    $result->execute();
    $recurence = $result->fetchColumn();

    //si il existe pas d'ajout dans la base
    if($recurence > 0){
        echo "<div class='add'>
        <h3 style='color:red'>Vous êtes déjà inscrit</h3>
        <p>Cliquez ici pour vous <a href='connexion.php'>Connecter</a></p>
        </div>";

    }
    //si il n'existe pas ajout dans la base
    else{
    $insertion=$newBD->prepare("INSERT into user (username, email, password)
            VALUES ('$username', '$email', '".hash('sha256', $password)."')");
    $result = $insertion->execute();
    
    
    if($result){
        echo "<div class='add'>
   <h3 style='color:green'>Vous êtes inscrit avec succès </h3>
   <p>Cliquez ici pour vous <a href='connexion.php'>Connecter</a></p>
    </div>";

    }}
 
 }
 else{
 ?>

<form action="" method="POST">
 <h1>Création de compte</h1>
 
 <label><b>Nom d'utilisateur</b></label>
 <input type="text" placeholder="Identifiant" name="username" required>

 <label><b>Email</b></label>
 <input type="email" placeholder="Email" name="email" required>

 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Mot de passe" name="password" required>
 <input type="reset" value="Reset">
 <input type="submit" id='submit' value='Ajout Utilisateur'>
 <p >Vous possedez déjà un compte ? <a href='connexion.php'>Connectez vous</a></p>
 </form>

 </div>
 <?php } ?>
 </body>
</html>