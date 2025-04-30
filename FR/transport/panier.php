
<?php 
session_start();
 // ----------------------------------DEBUT d'init des variables
 if (!isset($_SESSION['total'])) $_SESSION['total']=0;
 if (!isset($_GET['ajoutPanier'])) $ajoutPanier=""; // init de ajoutPanier si non déclaré
 else $ajoutPanier=$_GET['ajoutPanier'];
 
 if(!isset($_GET['modifPanier'])) $modifPanier="";// init de modifPanier si non déclaré
 else $modifPanier=$_GET['modifPanier'];
 
 
 if(!isset($_GET['suppPanier'])) $suppPanier="";// init de suppPanier si non déclaré
 else $suppPanier=$_GET['suppPanier'];
 
 
 if(!isset($_GET['enregistreCommande'])) $enregistreCommande="";// init de enregistreCommande si non déclaré
 else $enregistreCommande=$_GET['enregistreCommande'];
 
 if(!isset($_GET['article'])) $article="";// init de article si non déclaré
 else $article=$_GET['article'];
 
 if (isset($_SESSION['liste'])) $liste=$_SESSION['liste'];// recup de la liste de la session
 
 // ----------------------------------------- FIN d'init des variables
 
 
 ?>
 <?php require_once('../Connections/ConnexionBoutiquemx.php'); ?>
 <?php
 
 mysql_select_db($database_ConnexionBoutiquemx, $ConnexionBoutiquemx);
 
  //-----------------------------------AJOUT PANIER
if ($ajoutPanier=="AJOUTER")
{
$reference=$_GET['reference'];

$nb=1; //par défaut la quantité est = 1
$prix=$_GET['prix'];
$liste[]=array($reference,$nb,$prix,$prix);
$_SESSION['liste']=$liste;
//ajoute un article à la liste
}
// ----------------------------------MODIF PANIER
if ($modifPanier=="ACTUALISER")
{
  for ($i=0; $i<count($liste); $i++)
  {
   $nbi='nb'.$i;
   $liste[$i][1]=$_GET["$nbi"];// recup du nbr d'article dans la liste
   $liste[$i][3]=$liste[$i][1]*$liste[$i][2]; // prixArticle=nbre*prixUnitaire
   }
   $_SESSION['liste']=$liste; // mAj de la liste
   }
   
//-----------------------------------SUPP PANIER
if ($suppPanier=="SUPPRIMER")
{
$article=$_GET['article'];
	for ($i=0;$i<count($liste);$i++)
	{
	if($article==$i) array_splice($liste,$i,1);
	// suppression de l'article
	}
	$_SESSION['liste']=$liste;//mAj de la liste
	}
    //----------------------------------------- COMMANDER
	if ($enregistreCommande=="COMMANDER")
	{
	if(!isset($_GET['action']))
	$_SESSION['action']="ENREGISTRER";// mémorise l'action
	header("Location: commande.php");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<!-- InstanceBegin template="/Templates/ModelePublique.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>page PANIER</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.Style1 {color: #FF0000}
.Style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.Style7 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 36px;
	font-family: Arial, Helvetica, sans-serif;
}
.Style8 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Style9 {font-family: Arial, Helvetica, sans-serif}
.Style10 {color: #FFFFFF; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="51" colspan="4" bgcolor="#FF0000"><div align="center"><span class="Style7">BOUTIQUE MX </span></div></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#999999"><span class="Style1"></span></td>
        </tr>
        <tr>
          <td width="230" height="33" bgcolor="#FF0000"><div align="center" class="Style9"><span class="Style3"><a href="catalogue.php">CATALOGUE</a></span></div></td>
          <td width="236" bgcolor="#FF0000"><div align="center" class="Style10"><a href="panier.php">PANIER</a></div></td>
          <td width="240" bgcolor="#FF0000"><div align="center" class="Style10"><a href="commande.php">COMMANDE</a></div></td>
          <td width="289" bgcolor="#FF0000"><div align="center" class="Style10"><a href="../administrateur/index.php">ADMIN</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FF0000">&nbsp;</td>
  </tr>
</table>
<table width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="52"><!-- InstanceBeginEditable name="espace poublique" -->&nbsp;
     
		  <div align="center">
        <p align="center">PANIER</p>
		
	 <?php if(isset($liste)) {  //affiche le tableau s'il y a au moins un article ?>
	 		
         <form action="public/panier.php" method="get" >
	
          <table width="80%" border="1" cellspacing="0" cellpadding="1">
            <tr bgcolor="#CCCCCC">
              <td><div align="center">Titre</div></td>
              <td><div align="center">Quantit&eacute;</div></td>
              <td><div align="center">Prix</div></td>
              <td><div align="center">Supp</div></td>
            </tr>
            <?php
		   $total=0.00;
  for ($i=0;$i<count($liste);$i++)
{
	$query_rsPanier="select * from articles where reference = '".$liste[$i][0]."'";
	//echo $query_rsPanier;
	$rsPanier = mysql_query($query_rsPanier, $ConnexionBoutiquemx) or die(mysql_error());
    $row_rsPanier = mysql_fetch_assoc($rsPanier);		
	?> 
			<tr>
              
             <td><div align="center"><font size="2">
				 
             <?php echo $row_rsPanier['titre']?>
             </font></div>    </td>
    		  
              <td><div align="center">
                			
    <select name="nb<?php echo $i ?>"id="nb">
    <option value="1" <?php if($liste[$i][1]==1) echo "SELECTED"; ?>>1</option>
    <option value="2" <?php if($liste[$i][1]==2) echo "SELECTED"; ?>>2</option>
    <option value="3" <?php if($liste[$i][1]==3) echo "SELECTED"; ?>>3</option>
    		
                </select>
              </div></td>
			  
	<td><div align="center"><font size="2" face = "Verdana, Arial,Helvetica, sans-serif">
    <?php echo $row_rsPanier['prix']?>
    </font></div>
    </td>
	       <td>
	         <div align="center"><a href="panier.php?article=<?php echo $i ?>&suppPanier=SUPPRIMER">
             <img src="../administrateur/clic.gif" width="=18" height="15" border="0" >
             </a></div></td>
			</tr>
	<?php
    $total+=$row_rsPanier['prix']*$liste[$i][1];
	} //fin du bloc for
	   $_SESSION['total']=$total;//mémorise le total dans la session
		  ?>
                <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td> <div align="center"><strong>Total : <?php echo $total ?> Euros</strong></font></div></td>
            <td >&nbsp;</td>
          </tr>          			 
          </table> </td>
		   </tr>
  </table>
  <br>
		  
          <p align="center">
            <input type="submit" name="modifPanier" value="ACTUALISER" />
            <input type="submit" name="enregistreCommande" value="COMMANDER" />
          </p>
        </form>
      	 <?php } else { ?>
      <p align="center"><strong><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Votre panier est vide</font></strong></p>
	   <?php }?> </td>
  </tr>
	   
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
<table width="97%" height="26" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" bgcolor="#FF0000"><blockquote>
      <p><span class="Style8"> boutique de palettes en ligne </span></p>
    </blockquote></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
<!-- InstanceEnd --></html>
