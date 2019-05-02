<?php
try
{
	// We connect to MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sql_ex;charset=utf8', 'root', 'SteHol44%'); 


}
catch(Exception $e)
{
	// In case of error, we display a message and stop everything
	echo $e->getMessage();
	die();
}
?>