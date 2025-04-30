<?php require_once('../Connections/ConnexionBoutiquemx.php'); ?>
<?php
$colreference_rsFiche = "0";
if (isset($_GET['reference'])) {
  $colreference_rsFiche = (get_magic_quotes_gpc()) ? $_GET['reference'] : addslashes($_GET['reference']);
}
mysql_select_db($database_ConnexionBoutiquemx, $ConnexionBoutiquemx);
$query_rsFiche = sprintf("SELECT articles.reference, articles.titre, articles.auteur, articles.description, articles.prix, articles.photo, rubriques.theme FROM articles, rubriques WHERE rubriques.ID=articles.rubriqueID AND articles.reference='%s'", $colreference_rsFiche);
$rsFiche = mysql_query($query_rsFiche, $ConnexionBoutiquemx) or die(mysql_error());
$row_rsFiche = mysql_fetch_assoc($rsFiche);
$totalRows_rsFiche = mysql_num_rows($rsFiche);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/ModelePublique.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Document sans titre</title>
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
        <p>FICHE</p>
        <table width="44%" border="1" cellspacing="0" cellpadding="1">
          <tr>
            <td width="41%" rowspan="6"><img src="../images/<?php echo $row_rsFiche['photo']; ?>" alt="photo fiche" name="couverture" width="171" height="164" id="couverture" /></td>
            <td width="22%"><div align="right">Titre:</div></td>
            <td width="37%"><?php echo $row_rsFiche['titre']; ?></td>
          </tr>
          <tr>
            <td><div align="right">Auteur:</div></td>
            <td><?php echo $row_rsFiche['auteur']; ?></td>
          </tr>
          <tr>
            <td><div align="right">Theme:</div></td>
            <td><?php echo $row_rsFiche['theme']; ?></td>
          </tr>
          <tr>
            <td><div align="right">Description:</div></td>
            <td><?php echo $row_rsFiche['description']; ?></td>
          </tr>
          <tr>
            <td><div align="right">Prix:</div></td>
            <td><?php echo $row_rsFiche['prix']; ?></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center"><a href="panier.php?references=<?php echo $row_rsFiche['references']; ?>&amp;prix=<?php echo $row_rsFiche['prix']; ?>&amp;ajoutPanier=AJOUTER">ajouter cet article au panier </a></div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </div>
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
<?php
mysql_free_result($rsFiche);
?>
