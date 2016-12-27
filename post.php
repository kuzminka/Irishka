<?php
 $name = htmlspecialchars($_POST['name']);
 $email = htmlspecialchars($_POST['email']);
 $subject = "";
 $message = htmlspecialchars($_POST['message']);
$adminemail="irishka_kuz96@mail.ru";  // e-mail админа 
 
 
$date=date("Y-m-d"); // число.месяц.год 
 
$time=date("H:i:s"); // часы:минуты:секунды 
 
 // Отправка
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("mybd");
mysql_query(" SET NAMES 'utf8' "); // mysql_set_charset("utf8");
if(!$connection || !$db)
{
    exit(mysql_error());
}
 
$msg=" 
 
 
NAME: $name 
 
 
E-MAIL: $email
 
 
MESSAGE: $message 
 
 
"; 
 mysql_query("INSERT INTO mail (name, email, message, date, time)
        VALUES ('$name', '$email', '$message', '$date', '$time')");
        mysql_close(); 
		
mail("$adminemail", "$date $time Message from $name", "$msg"); 

?>