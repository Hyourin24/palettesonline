<?php require_once('../Connections/ConnexionBoutiquemx.php'); ?><?php require_once('../Connections/ConnexionBoutiquemx.php'); 
if(!isset($_GET['VARTheme'])) $_GET['VARTheme']=1;
//init de VARTheme si nom déclaré
?>

<?php
mysql_select_db($database_ConnexionBoutiquemx, $ConnexionBoutiquemx);
$query_rsTheme = "SELECT * FROM rubriques ORDER BY theme ASC";
$rsTheme = mysql_query($query_rsTheme, $ConnexionBoutiquemx) or die(mysql_error());
$row_rsTheme = mysql_fetch_assoc($rsTheme);
$totalRows_rsTheme = mysql_num_rows($rsTheme);

$coltitre_rsCatalogue = "mehari";
if (isset($_GET['VARtitre'])) {
  $coltitre_rsCatalogue = (get_magic_quotes_gpc()) ? $_GET['VARtitre'] : addslashes($_GET['VARtitre']);
}
$coltheme_rsCatalogue = "1";
if (isset($_GET['VARtheme'])) {
  $coltheme_rsCatalogue = (get_magic_quotes_gpc()) ? $_GET['VARtheme'] : addslashes($_GET['VARtheme']);
}
mysql_select_db($database_ConnexionBoutiquemx, $ConnexionBoutiquemx);
$query_rsCatalogue = sprintf("SELECT rubriques.theme, articles.reference, articles.titre, articles.auteur, articles.prix FROM rubriques, articles WHERE articles.rubriqueID  = %s  AND rubriques.ID=articles.rubriqueID AND titre LIKE '%%%s%%'", $coltheme_rsCatalogue,$coltitre_rsCatalogue);
$rsCatalogue = mysql_query($query_rsCatalogue, $ConnexionBoutiquemx) or die(mysql_error());
$row_rsCatalogue = mysql_fetch_assoc($rsCatalogue);
$totalRows_rsCatalogue = mysql_num_rows($rsCatalogue);
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
        <p>CATALOGUE</p>
        <form id="form1" name="form1" method="get" action="catalogue.php">
          <p>Selectionnez un theme :
            <select name="VARtheme" size="1" id="VARtheme">
              <?php
do {  
?>
              <option value="<?php echo $row_rsTheme['ID']?>"<?php if (!(strcmp($row_rsTheme['ID'], $_GET['VARTheme']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsTheme['theme']?></option>
              <?php
} while ($row_rsTheme = mysql_fetch_assoc($rsTheme));
  $rows = mysql_num_rows($rsTheme);
  if($rows > 0) {
      mysql_data_seek($rsTheme, 0);
	  $row_rsTheme = mysql_fetch_assoc($rsTheme);
  }
?>
            </select>

ou saisissez un titre :
<input name="VARtitre" type="text" id="VARtitre" />
<input type="submit" name="Submit" value="AFFICHER" />
        </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <table width="80%" border="1" cellspacing="0" cellpadding="1">
            <tr>
              <td width="18%" bgcolor="#CCCCCC"><div align="center">Titre</div>                <div align="center"></div></td>
              <td width="20%" bgcolor="#CCCCCC"><div align="center">Auteur</div>                <div align="center"></div></td>
              <td width="20%" bgcolor="#CCCCCC"><div align="center">Theme</div>                <div align="center"></div></td>
              <td width="23%" bgcolor="#CCCCCC"><div align="center">Prix</div>                <div align="center"></div></td>
            </tr>
            
            <?php do { ?>
              <tr>
                <td><div align="center"><a href="fiche.php?reference=<?php echo $row_rsCatalogue['reference']; ?>"><?php echo $row_rsCatalogue['titre']; ?></a></font></div></td>
				
				
                <td><div align="center"><?php echo $row_rsCatalogue['auteur']; ?></div></td>
                <td><div align="center"><?php echo $row_rsCatalogue['theme']; ?></div></td>
                <td><div align="center"><?php echo $row_rsCatalogue['prix']; ?></div></td>
              </tr>
              <?php } while ($row_rsCatalogue = mysql_fetch_assoc($rsCatalogue)); ?>
            <tr>
              <td colspan="4" bgcolor="#CCCCCC"><div align="center"></div>
                  <div align="center"></div>
                <div align="center"></div>
                <div align="center"></div></td>
            </tr>
            <tr>
              <td colspan="4"><div align="center">Selectionnez un theme et eventuellement le titre d'un livre et cliquez sur AFFICHER puis, pour consulter la fiche d'un livre, cliquez sur son titre </div></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;  </p>
        </form>
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
</body><!-- InstanceEnd --></html>
<?php
mysql_free_result($rsTheme);

mysql_free_result($rsCatalogue);
?>
