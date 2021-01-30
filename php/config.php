<?php
 $db_user = "root";
 $db_pass = "";
 $host = 'mysql:host=localhost;dbname=pfe;charset=utf8';
try{
 $db = new PDO($host, $db_user, $db_pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  die('<h1>imposible de se connecter a la base de donnee</h1>');
}
?>
