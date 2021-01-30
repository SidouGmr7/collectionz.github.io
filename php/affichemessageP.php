<?php

  session_start();
  require_once ('config.php');

  if ($_GET['action'] == "vu") {
    $id=$_GET['id'];
    $query = $db->query("UPDATE  message SET vu = 1 WHERE ID ='$id'");
    $_SESSION['vu']=1;
    header('location:../affichmessage.php');
  }


 ?>
