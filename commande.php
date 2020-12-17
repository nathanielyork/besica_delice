<?php require('header.php');?>
<h3>Voici une liste de tous nos derniers produits :</h3>

Nom du produit........................prix......................stock <br>
   
<?php
$LesProduit=$bdd->prepare("SELECT * FROM produit");
$LesProduit->execute();
while ($unProduit=$LesProduit->fetch(PDO::FETCH_OBJ)) {
?>

<?php echo$unProduit->nom; ?>   <?php echo$unProduit->prix;?>    <?php echo$unProduit->stock; ?> <br>
            
            
            




<?php
}
?>










 <!-- debut commande -->
 <div class="container">
<h3>EFFECTUEZ VOTRE COMMANDE ICI</h3>
    <form action="" method="POST">
    <select name="nomp" class="browser-default">
   <?php
   $lesproduits=$bdd->prepare("SELECT * FROM produit");
   $lesproduits->execute();
   while ($p=$lesproduits->fetch(PDO::FETCH_OBJ)) {?>
   <!-- option -->
   <option value="<?php echo$p->nom ; ?>"><?php echo$p->nom; ?></option>
   <!-- echo""."(".$p->prix." FCFA )" -->
   <?php
     # code...
   }
   ?>
    </select>
    <div class="form-group"> <br>Quantite:<input type="text" name="quantite"/></div> 
    <div class="form-group"><input type="submit" class="btn btn-primary" value="effectuer la commande" name="submit">
    </div> 
    </form>
    </div>
    <?php
if (isset($_POST['submit'])) {
  if (isset($_SESSION['pseudo'])) {
    # L'utilisateur est bel et bien connecté
    

  $nomp=$_POST['nomp'];
  $quantite=$_POST['quantite'];
if ($quantite) {
  //effectuer la commande
  //produit correspondat
  if($_POST['nomp']){
        $P_existe=$bdd->prepare("SELECT * FROM produit WHERE nom LIKE?");
        $P_existe->execute(array('%'.$nomp.'%'));
        $Prod=$P_existe->fetch(PDO::FETCH_OBJ);
        //var qte et prix pr calculer le prix a payer
        $q=$_POST['quantite'];
        $p=$Prod->prix;
    $pseudo=$_SESSION['pseudo'];
    $nomp=$Prod->nom;
    $dateC=date("d/m/y");
    $prixApayer=$q*$p;
    $etat="non livre";
    // echo $p;
    // echo $q;
    // echo$prixApayer;
    // echo$pseudo;
    // echo$nomp;
    // echo$etat;
    // echo$dateC;
    $EffectuerLaCommande=$bdd->prepare("INSERT INTO commandes(pseudo,nomP,dateC,prixP,etat) VALUES(?,?,?,?,?)");
    $EffectuerLaCommande->execute(array($pseudo,$nomp,$dateC,$prixApayer,$etat));
    echo"commande effectuée!!!!";
}
  
}else {
  echo'veuillez remplir tous les champs';
}
  }else {
    // AlertError("Vous devez vous connectez d'abord!!!");
    header('Location:login.php');
  }

}?>


<!-- fin  commande-->





<?php require('footer.php')?>

