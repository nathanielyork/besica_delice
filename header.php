<?php 
session_start();
include('bs_link.php');
include('bdd.php');
?>
<!DOCTYPE html>
<html>
<head>  
<link rel="stylesheet" href="main.css">
</head>
<body>
<nav>
    <div class="nav-wrapper teal lighten">
      <a href="#" class="brand-logo">BESICA DELICE</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="apropos.php">A propos de l'auteur</a></li>
        <li><a href="contact.php">Nous contacter</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="commande.php">Commande</a></li>
        <li><a href="boutique.php">Boutique</a></li>
        <li><a href="profil.php">profile</a></li>
        <li><a href="accueil.php">Accueil</a></li>
      </ul>
    </div>
  </nav>
</body>
</html>