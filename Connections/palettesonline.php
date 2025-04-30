<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_palettesonline = "localhost";
$database_palettesonline = "palettesonline";
$username_palettesonline = "root";
$password_palettesonline = "";
$palettesonline = mysql_pconnect($hostname_palettesonline, $username_palettesonline, $password_palettesonline) or trigger_error(mysql_error(),E_USER_ERROR); 
?>