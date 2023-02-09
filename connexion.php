<html>
 <head>
 <meta charset="utf-8">
 <title>Page de Connexion</title>
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body>
 <img src="logo.jpg" height="20%" width="25%"/>
 <div id="container">
 
 
 
 <?php
 //si une session existe fermeture de cette dernière
    if(session_start())
        session_destroy();

 include 'bdd.php';  

 
 ?>
<div id="test">
<form action="verif.php" method="POST">
 <h1>Connexion</h1>
 
 <label><b>Nom d'utilisateur</b></label>
 <input type="text" placeholder="Identifiant" name="username" required>

 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Mot de passe" name="password" required>
 <input type="reset" value="Reset">
 <input type="submit" id='submit' value='Connexion'>
 <p >Vous ne possedez pas encore compte ? <a href='ajout-utilisateur.php'>Inscrivez-vous</a></p>
 </form>
 </div>
 </div>
 
 </body>
</html>