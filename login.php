<?php 
if (isset($_SESSION['pseudo'])) {
  header('Location:profil.php');
}
include('header.php')
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>login</title>
</head>
<body>
<div class="container">
<form method="POST" action="login.php" class="well col-md-6 col-md-offset-3" autocomplete="on">
<div class="container center">
<div class="cols 12">

<div class="form-group">
          <input name="pseudo" placeholder="Pseudo" id="pseudo" type="text" class="validate">
          <label for="pseudo">Pseudo</label>
</div>


<div class="form-group">
          <input name="pass" placeholder="Mot de passe" id="mot_de_passe" type="password" class="validate">
          <label for="mot_de_passe">Mot de passe</label>

</div>
<div class="row">
<input type="submit" class="btn btn-primary" value="Se connecter" name="submit"><br><br>
<a href="register.php" class="btn">je n'ai pas encore de commpte</a>

  </div>
</div>
</div>
</form>
   
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $pseudo=htmlspecialchars($_POST['pseudo']);
  $pass=sha1($_POST['pass']);
  if ($pseudo&&$pass) {
    // extract($_POST);
    $reqClient=$bdd->prepare("SELECT * FROM clients WHERE pseudo=? AND pass=?");
    $reqClient->execute(array($pseudo,$pass));
    $compteExistant=$reqClient->fetch(PDO::FETCH_OBJ);
    if ($compteExistant) {
      $_SESSION['pseudo']=$pseudo;
      $_SESSION['mailC']=$compteExistant->mailC;
      $_SESSION['contact']=$compteExistant->contact;
      $_SESSION['dateCompte']=$compteExistant->dateCompte;
      header('Location:profil.php');
      // echo"resussi!!";
      
    }else {
      echo'<h2>Les informations entrées ne correspondent a aucun compte!</h2>';
      echo"<div></div>";
    }
  }else {
    echo"veuillez remplir tous les champs";
  }
 
}
include('footer.php')
?>