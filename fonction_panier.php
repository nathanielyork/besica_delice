<?php
function creationpanier()
{
if (isset($SESSION['panier'])) {
$_SESSION['panier']=array();
$_SESSION['panier']['libelleproduit']=array();
$_SESSION['panier']['qteproduit']=array();
$_SESSION['panier']['prixproduit']=array();
$_SESSION['panier']['verrou']=false;
echo'panier creé';
}
return true;
}
function ajouterarticle($libelleproduit,$qteproduit ,$prixproduit)
{
    if (creationpanier()&& !isVerrouile()) {
        # code...
        $position_produit=array_search($libelleproduit,$_SESSION['panier']['libelleproduit']);
        if ($position_produit!==false) {
           $_SESSION['panier']['libelleproduit'][$libelleproduit]+=$qteproduit;

        }else{
            array_push($_SESSION['panier']['libelleproduit'],$libelleproduit);
            array_push($_SESSION['panier']['qteproduit'],$qteproduit);
            array_push($_SESSION['panier']['prixproduit'],$prixproduit);
        }
    }else{
        echo'erreur!!!!!!';
    }
}


function modifierproduit($libelleproduit,$qteproduit)
{
    # code...
    if (creationpanier()&& !isVerrouile() ) {
        # code...
        if ($qteproduit>0) {
            # codquantite de produiot > a zero
            $position_produit=array_search($_SESSION['panier']['libelleproduit'],$libelleproduit);
            if ($position_produit!==false) {
                $_SESSION['panier']['libelleproduit'][$position_produit]=$qteproduit;
            }

        }else {
supprimerproduit($libelleproduit);
        }
    }else{echo'erreur!!!';}
}
function supprimerarticle($libelleproduit)
{
if (creationpanier() &&  !isVerrouile) {
    $tmp=array();
    $tmp['libelleproduit']=array();
    $tmp['qteproduit']=array();
    $tmp['prixproduit']=array();
    $tmp['verrou']=array();
for ($i;$i=count($_SESSION['panier']['libelleproduit']);$i++) { 
if ($_SESSION['panier']['libelleproduit'][$i]!==$libelleproduit) {
    array_push($_SESSION['panier']['libelleproduit'],$_SESSION['panier']['libelleproduit'][$i]);
    array_push($_SESSION['panier']['qteproduit'],$_SESSION['panier']['qteproduit'][$i]);
    array_push($_SESSION['panier']['prixproduit'],$_SESSION['panier']['prixproduit'][$i]);
}
}
$_SESSION['panier']=$tmp;
unset($tmp);
    
}    else {
    echo'erreur!!!';
}

}
function isVerrouile(){
    if (isset($_SESSION['panier'])&& $_SESSION['isVerrouile']) {
        # code...
        return true;
    }else {
        return false;
    }
}
function suprimmerpanier(){
   if (isset($_SESSION['panier'])) {
unset($_SESSION['panier']);
   }
}
function compterarticle($var = null)
{
if (isset($_SESSION['panier'])) {
    $nbre=count($_SESSION['panier']['libelleproduit']);
    return $nbre;
}
else{echo"erreur";}
}
function MontantGlobal()
{
    $montantTotal=0;
    for ($i=0; $i <count($_SESSION['panier']['libelleproduit']) ; $i++) { 
        $montantTotal+=$_SESSION['panier']['qteproduit']+$_SESSION['panier']['prixproduit'];
    }
    return $montantTotal;
}


?>