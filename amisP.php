<?php
    session_start();
    require_once 'php/config.php';

    if ($_GET['action'] == "delete") {
      $id=$_GET['id'];
      $query = $db->query("DELETE FROM ami WHERE ID_Ami ='$id'");
      header('location:amis.php');
    }
    if ($_GET['action'] == "add") {
      $query = $db->prepare("INSERT INTO ami(Colectionneur , Colectionneur_ami , état) VALUES (?,?,?)");
      $result = $query->execute([$_SESSION['login'] ,$_GET['login'],0]);
      header('location:amis.php');
    }
    if ($_GET['action'] == "accipte") {
      $id=$_GET['id'];
      $query = $db->query("UPDATE  ami SET état = 1 WHERE ID_Ami ='$id'");
      header('location:amis.php');
    }
    if ($_GET['action'] == "delete_user") {
      $id=$_GET['user_id'];
      $query = $db->query("DELETE FROM users WHERE ID ='$id'");
      header('location:amis.php');
    }
 ?>
