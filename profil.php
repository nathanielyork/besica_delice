
	<?php require'header.php';?>
	
	<?php 
if (isset($_SESSION['pseudo'])) {
		
	}else {
		header('location: login.php');
	}
	if (isset($_GET['action'])) {
		if ($_GET['action']=='deconnexion') {
			session_destroy();
			unset($_SESSION['pseudo']);
			header("location: accueil.php");
		}
		}
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFIL</title>
</head>
<body>
</a>
<div class="container center">
<br>
<a href="?action=deconnexion"><strong class="btn">Se Deconnecter</strong></a>
</div>
<div class="container center">

<h2>VOTRE PROFIL:</h2>
VUE : <br><img src="photosdeprofildesclients/<?php echo $_SESSION['pseudo']; ?>.jpg" alt=""><br>
 PSEUDO : <?= htmlspecialchars($_SESSION['pseudo']) ?><br>
ADRESSE EMAIL :  <?= htmlspecialchars($_SESSION['mailC']) ?><br>
 NUMERO DE TELEPHONE : <?= htmlspecialchars($_SESSION['contact']) ?><br>
 DATE DE CREATION DU COMPTE : <?= htmlspecialchars($_SESSION['dateCompte']) ?><br></div>


</body>
</html>

<?php require'footer.php';

?>
