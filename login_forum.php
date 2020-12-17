<?php 
require'bs_link.php';

session_start();
if (isset($_SESSION['id_user']) OR isset($_SESSION['pseudo_user'])) {
    # code...
    header('location: profil.php');
    exit();

}
?>
<?php
// require'filter.php';
require'bs_link.php';
// session_start();
require'bdd.php';
if (isset($_POST['submit'])) {
  $email=strip_tags($_POST['email']);
  $password=strip_tags($_POST['password']);
  # code...
  if ($email&&$password){
    extract($_POST);
    $_password=md5($password);
    $reqUser=$bdd->prepare("SELECT * FROM users WHERE email=? AND pass=?");
    $reqUser->execute(array($email,$_password));
 $userHasBennFound=$reqUser->rowCount();
 if ($userHasBennFound) {

$user=$reqUser->fetch(PDO::FETCH_OBJ);
$_SESSION['id_user']=$user->id;
$_SESSION['pseudo_user']=$user->pseudo;
$_SESSION['email_user']=$user->email;
$_SESSION['profil_pic_user']=$user->profil_pic;
//redirection
header('location:profil.php?id='.$user->id);
}else{
   echo'<h2 class="text-danger">Les informations entrées ne correspondent a aucun compte!</h2>';
 }
 
  }else { 
     echo'<h2 class="text-danger">Les informations entrées ne correspondent a aucun compte!</h2>';

  }

}











include'views_login.php';






    ?>

    