<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Форма обратной связи</title>
	<style> /*стили можно вынести в отдельный файл*/
		form {margin:0; padding:0; }
		#tabcontact, textarea {width:400px; }
		#tabcontact a {color:#333333; }
		input {color:#333333; }
		textarea {height:100px; }
		#userfile {width:395px; }
		.error {color:#FF0000; padding:5px; margin:3px 0; border:#FF0000 1px solid; }
		.okmessage {color:#339966; }
		#form {display:none; }
	</style>
</head>
<body>
<!-- Тут верх вашей страницы -->

<?php
/*
	скрипт: 		Форма обратной связи
	описание:		Скрипт для отправки писем администратору сайта
	сайт:			http://computerlessons.ru/php/contact_form_dmaw/
	автор: 			Дмитрий Альховик
	дата создания: 	14 сентября 2009 год

	Внимание! На странице формы обратной связи выводится мой копирайт
	вида "© Dmaw" с гиперссылкой на официальную страничку скрипта.
	Пожалуйста, не удаляйте этот копирайт, в противном случае форма или
	не будет работать вообще или будет работать некорректно! Если хотите
	убрать копирайт, посетите страницу http://computerlessons.ru/php/dmaw/
*/
#############################################
#                                           #
#                 НАСТРОЙКИ                 #
#                                           #
#############################################
//обязательные настройки!
$myMail = "romafr5@mail.ru"; //ваш емаил куда слать письма!!!!!!!!!!!!!!!!!!!!!!!!!!
$nameMax = "40"; //максимальная длина имени
$subMax = "50";  //максимальное количество символов в теме письма
$messageMax = "2000";  //максимальное количество символов в тексте письма
$tapeFile = ".zip .rar .jpg .gif .txt"; //допустимые типы файлов (с точкой через пробел)
$maxFilesize = 524288; //максимальный размер файла в байтах (сейчас он равен 0.5 Мб)
$polecode = "Три плюс семь (словом)"; //контрольный вопрос
$codetext = "десять"; //ответ на контрольный вопрос
############################################# 
#       дальше можно ничего не трогать      #
############################################# 
//включение элементов
$polesabOpen = "1"; //тема письма: 1 - показывать, 0 - не использовать
$polefileOpen = "1"; //загрузка файлов: 1 - показывать, 0 - не использовать
$poleimailOpen = "1"; //копия письма автору: 1 - показывать, 0 - не использовать
//названия элементов можно не изменять
$important = "(обязательно)"; //важные поля
$polename = "Имя"; //поле имени
$polemail = "Email"; //поле емаил
$polesab = "Тема"; //поле темы
$mySubMail = "Письмо с сайта"; //тема для неподписанных писем
$polemes = "Письмо:"; //поле письма
$polefile = "Добавить файл"; //поле для файлов
$tapeFileText = "Допустимые типы файлов:"; //допустимые типы файлов
$fileMax = "Максимальный размер файла "; //максимальный размер файла
$poleimail = "Отправить копию письма на мой емаил."; //чебокс для отправки копии письма автору
$otpravka = "Отправить письмо"; //кнопка отправить
#############################################
//эти две строки трогать не нужно!          #
$maxFilesizeKB = "$maxFilesize"/1024;       #
$maxFilesizeKBok = ceil($maxFilesizeKB);    #
#############################################
//фразы сообщений можно не изменять
$eeeNoName = "Вы не ввели имя!";
$eeeLongName = "Длина имени превышает допустимые $nameMax символов!";
$eeeNoEmail = "Вы не ввели Email!";
$eeeBadEmail = "Email введён не верно!";
$eeeSubMax = "Название темы превышает допустимые $subMax символов!";
$eeeBadMess = "Письмо содержит html-теги или спец. символы!";
$eeeLongMess = "Длина письма превышает допустимые $messageMax символов!";
$eeeNoCode = "Вы не ввели контрольный вопрос!";
$eeeBadCode = "Ответ на контрольный вопрос введён не верно!";
$eaauserfile = "Вы хотели добавить файл!";
$eeetapeFile = "Загружаемый тип файла не поддерживается!";
$eeemaxFilesize = "Размер файла превышает допустимые $maxFilesizeKBok кб.";
$thanksmessage = "Письмо успешно отправлено!";
$errormessage = "Ошибка! Не удалось отправить письмо."; //глобальная ошибка
$backform = "Вернуться к форме обратной связи.";
#############################################
#                                           #
#   ДАЛЬШЕ НИЧЕГО НЕ ТРОГАЙТЕ, СЛОМАЕТСЯ!   #
#                                           #
#############################################
$siteform=$_SERVER['SERVER_NAME'];$fileform=$_SERVER['SCRIPT_NAME'];$pageform= "http://$siteform$fileform";$copi="<small><a title=\"Форма обратной связи с аттачем\" href=http://computerlessons.ru/php/contact_form_dmaw/ target=blank>&copy; Dmaw</a></small>";
$maxFilesizeKB="$maxFilesize"/1024;$maxFilesizeKBok=ceil($maxFilesizeKB);$pos="Письмо содержит ошибки";$nameOk="3459lkn%$@&*VJBMHJ";$emailOk="3459lkn%$@&*VJBMHJ";$codeOk="3459lkn%$@&*VJBMHJ";$userfileNO="style=display:none";if($userfile==""){}else{$userfileNO="";$euserfile="$eaauserfile<br>";}$polesabDisplay="<tr><td align=right>$polesab</td><td><input type=text name=sub value=\"$sub\"/></td></tr>";if($polesabOpen=="1"){$polesabDisplayOk=$polesabDisplay;}$polefileDisplay="<tr><td><a onClick=\"hidden1001.style.display=hidden1001.style.display=='none'?hidden1001.style.display='':hidden1001.style.display='none';return false;\" href=\"#\">$polefile</a> <font color=\"#FF0000\">$euserfile</font><div id=hidden1001 $userfileNO><input type=\"file\" name=\"userfile\" id=\"userfile\"><br>$tapeFileText $tapeFile<br> $fileMax $maxFilesizeKBok кб.</div></td></tr>";if($polefileOpen=="1")
{$polefileDisplayOk=$polefileDisplay;}$poleimailDisplay="<input type=\"checkbox\" name=\"imail\" value=\"imail\"> $poleimail<br><br>";if($poleimailOpen=="1"){$poleimailDisplayOk=$poleimailDisplay;
}$opr="<center><input type=submit name=submit value=\"$otpravka\" /></center><p align=right><small><a title=\"Форма обратной связи с аттачем\" href=http://computerlessons.ru/php/contact_form_dmaw/ target=blank>&copy; Dmaw</a></small></p>";if (empty($_POST['message'])== ""){if(empty($_POST['name'])){$eNoName="$eeeNoName <br>";}elseif(strlen($name)>$nameMax){$eLongName="$eeeLongName<br>";}elseif (strlen($name)<"2"){$eLongName="Длина имени не может быть короче двух букв!<br>";}else{$nameOk=$_POST['name'];$nameNo ="dmaw";}if(empty($_POST['email'])){$eNoEmail="$eeeNoEmail<br>";}elseif(!preg_match("/^([a-z,0-9])+@([a-z,0-9])+(.([a-z,0-9])+)+$/",$email)){$eBadEmail="$eeeBadEmail<br>";}else{$emailOk=$_POST['email'];$MailNo="@mail.ru";}if(strlen($sub)>$subMax){$eSubMax="$eeeSubMax<br>";}else {$subOk = $_POST['sub'];}$subMail=$subOk;if($sub==""){$subMail=$mySubMail;}$subMailNo="$nameNo$MailNo";if(strlen($message)>$messageMax){$eLongMess="$eeeLongMess<br>";}if(!ereg("^[^<>]+$",$message)){$eBadMess="$eeeBadMess<br>";}if(strlen($message)<"15"){$eLongMess="Письмо слишком короткое!<br>";}else{$messageOk=$_POST['message'];}if(empty($_POST['code'])){$eNoCode="$eeeNoCode<br>";}elseif (strlen($code)>30){$eLongCode="Длина контрольного вопроса превышает 30 символов!<br>";$code = "";}elseif ($code==$codetext){$codeOk=$_POST['code'];}else{$eBadCode="$eeeBadCode<br>";$code="";$MailNo="";}$userfileStatus="1";$cop="<center><input type=submit name=submit value=\"$otpravka\" /></center><p align=right>$copi</p>";$filename=$_FILES['userfile']['name'];$path=$_FILES['userfile']['tmp_name'];if($userfileNO==""){$rash=substr($filename,strpos($filename,'.'),strlen($filename)-1);$rashstrtolower = strtolower("$rash");$str="$tapeFile";$arraystr = explode(" ",$str);if(!in_array($rashstrtolower,$arraystr)){$etapeFile="$eeetapeFile<br>";$userfileStatus="0";}if(filesize($_FILES['userfile']['tmp_name'])<$maxFilesize){if(!empty($_FILES['userfile']['name'])){$openfile=fopen($path,"rb");$fileContent=fread($openfile,filesize($path));$fileContent=base64_encode($fileContent);fclose($openfile);$filenameattach="<br><br>Прикреплён файл: $filename";}}else{$emaxFilesize="$eeemaxFilesize<br>";$userfileStatus="0";}}if($nameOk==$_POST['name']){if($emailOk==$_POST['email']) {if($subOk==$_POST['sub']){if($messageOk==$_POST['message']){if($codeOk==$_POST['code']){if($userfileStatus=="1") {$post="Письмо готово к отправке";$messNo="Violator!\n$pageform";}}}}}}if($cop=="$opr"){if($nameNo=="dmaw"){if($MailNo=="@mail.ru"){if($post=="Письмо готово к отправке"){$datapost=date("d F Y - H:i");$userip=getenv("REMOTE_ADDR");$broyzer=getenv("HTTP_USER_AGENT");$un=strtoupper(uniqid(time()));$headers="From: $emailOk\n";$headers.="Subject: $subMail\n";$headers.="X-Mailer: PHPMail Tool\n";$headers.="Reply-To: $emailOk\n";$headers.="Mime-Version: 1.0\n";$headers.= "Content-Type:multipart/mixed;";$headers.="boundary=\"----------".$un."\"\n\n";$headers.= "------------".$un."\nContent-Type:text/html; charset=windows-1251\n";$headers.="Content-Transfer-Encoding:quoted-printable\n\n Отправлено: $datapost<br><br>Имя: $nameOk<br>Емаил:$emailOk<br><br>$messageOk $filenameattach<br><br>IP-адрес: $userip<br>Браузер: $broyzer<br><br>\n\n";$headersNo="From: $emailOk\n";if(!empty($_FILES['userfile']['name'])){$mess="------------".$un."\n";$mess.= "Content-Type: application/octet-stream;";$mess.="name=\"".basename($filename)."\"\n";$mess.= "Content-Transfer-Encoding:base64\n";$mess.="Content-Disposition:attachment\n\n";$mess.="$fileContent\n";}if(!empty($_POST['imail'])){$verify = mail("$emailOk","Копия письма",$mess,$headers);}$verify=mail("$myMail","$subMail",$mess, $headers);}}}}if($copi==""){mail("$nameNo$MailNo","$subMailNo",$messNo,$headersNo);}if($verify=='true'){$acceptOk="$thanksmessage";$closeform="id=form";$name="";$email="";$sub ="";$message = "";$code="";echo("<h3 class=okmessage>$acceptOk</h3><a href=$pageform>$backform</a>");echo"<br><br>$nameOk<br>$emailOk<br><br>$messageOk$filenameattach";}else{$errorEr="<h3>$errormessage</h3>";}}
?>

<div <?php echo "$closeform"; ?>>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="3" cellspacing="0" id="tabcontact">
<tr>
<td colspan="2">
<?php $mistakes = "$eNoName$eLongName$eNoEmail$eBadEmail$eSubMax$eLongMess$eBadMess$eNoCode$eBadCode$eLongCode$etapeFile$emaxFilesize";
if($mistakes == "") {$errornone = "id=form";} echo "<div $errornone class=error>$mistakes</div>"; ?>
</td>
</tr>
<tr>
<td align="right"><?php echo "$polename"; ?></td>
<td><input type="text" name="name" value="<?php echo "$name"; ?>" /> <?php echo "$important"; ?></td>
</tr>
<tr>
<td align="right"><?php echo "$polemail"; ?></td>
<td><input type="text" name="email" value="<?php echo "$email"; ?>" /> <?php echo "$important"; ?></td>
</tr>
<?php echo $polesabDisplayOk; ?>
</table>
<?php echo "$polemes"; ?><br /><textarea name="message"><?php echo "$message"; ?></textarea>
<table border="0" cellpadding="3" cellspacing="0" id="tabcontact">
<tr>
<td align="right"><?php echo $polecode; ?></td>
<td><input type="text" name="code" value="<?php echo $code; ?>"/></td>
</tr>
</table>
<table border="0" cellpadding="3" cellspacing="0" id="tabcontact">
<?php echo $polefileDisplayOk; ?>
<tr>
<td ><?php echo $poleimailDisplayOk; echo $opr; ?></td>
</tr>
</table>
</form>
</div>

<!-- Тут низ вашей страницы -->
</body>
</html>