<?php
/*1-)  Proposez  une  fonction  PHP  dénommée  connecter  qui  utilisera  la  fonction  mysql_connect
(fonction  de  l’extension  php_mysql)  pour  établir  une  connexion  avec  la  base  de  données 
bd_reunion_familiale.  */
try{
	$con = new PDO('mysql:host=localhost;dbname=reunion_familiale;', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}catch(Exception $ex){
	die('Impossible de connecter code:  '.$ex->getMessage());
}
?>