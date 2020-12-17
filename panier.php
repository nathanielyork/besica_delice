<?php 
include_once('header.php');
include_once('fonction_panier.php');
?>

<form action="post" action="">
<table width="400">
<tr>
    <td>Votre panier</td>
</tr>

<tr>
    <td>nom</td>
    <td>quantité</td>
    <td>prix</td>


</tr>
<?php

$nbProduit=count($_SESSION['panier']['libelleproduit']);
if ($nbProduit<=0) {
    echo'votre panier est vide';
}else {
    for ($i=0; $i < $nbProduit ; $i++) { 
        echo'salut';
    }
}

?>







</table>
</form>




