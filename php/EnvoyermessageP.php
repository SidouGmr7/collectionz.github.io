<?php
  require_once ('config.php');
  session_start();
  $id= $_SESSION['id'];
 ?>
 <?php

  if($_POST['destinataire']==$_SESSION['login']){
    $_SESSION['vousmeme']=1;
  }else{
   $destinataire=$_POST['destinataire'];
   $message=$_POST['message'];
   $objet=$_POST['objet'];
   $query="SELECT id FROM users where login = '$destinataire'";
   $result = $db->prepare($query);
   $result->execute();
     if($result->rowCount() > 0){
       $row = $result->fetch();
       $id_destinataire=$row['id'];
       $query2="INSERT INTO message(ID_Expediteur,ID_Destinataire,Message,Objet) VALUES(?,?,?,?)";
       $insert=$db->prepare($query2);
       $result2 = $insert->execute([$id,$id_destinataire,$message,$objet]);
       $_SESSION['message']=1;
     }else{$_SESSION['messageerr']=1;}
 }
header('location:../envoyermes.php');
