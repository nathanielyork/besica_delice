<?php include('header.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>contact</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
<div class="container center">
<b>Voici un formulaire pour nous laisser un message<b></br>


<div class="container">
<form action="" method="POST" class="container well col-md-6 col-md-offset-3" autocomplete="on" enctype="multipart/form-data">

Votre message:<br><input type="text" name="msg" placeholder="Votre message"><br>
<button class="btn" type="submit" name="submit">ENVOYER</button>

</form>
</div>



<?php 
  if(isset($_SESSION['pseudo'])){
if (isset($_POST['submit'])) {
  $msg=htmlspecialchars_decode(trim($_POST['msg']));
  if($msg){
    $auteur=$_SESSION['pseudo'];
    $dateenvoi=dete("d/m/y");
$envoiMSG=$bdd->prepare("INSERT INTO messages VALUES(?,?,?)");
$envoiMSG->execute(array($auteur,$msg,$dateenvoi));
echo"message envoye";
  }else {
    echo'Votre message ne dois etre vide';
  }
}
  }else {
    // header('Location:login.php');
    echo'vous n\'etes pas connecté';
  }


?>
<a href="mailto:nathsenou@gmail.com">Notre adresse email</a><br>
<a href="mailto:nathsenou@gmail.com">facebook</a><br>
<a href="mailto:nathsenou@gmail.com">twitter</a><br>
<a href="mailto:nathsenou@gmail.com">pinterest</a><br>
<a href="mailto:nathsenou@gmail.com">Instagram</a><br>

</div>
</body>
</html>
<?php include('footer.php') ?>
