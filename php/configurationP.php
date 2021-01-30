<?php
  session_start();
  require_once 'config.php';
  $ID=$_SESSION['id'];
  if ($_POST['login']!= $_SESSION['login']) {
    $login=$_POST['login'];
    $query = $db->query("UPDATE  users SET login = '$login' WHERE ID ='$ID'");
    session_destroy();
    header('location: ../index.php');
  }else{
    header('location: ../configuration.php');
  }
    $email=$_POST['email'];
    $query = $db->query("UPDATE  users SET email = '$email' WHERE ID ='$ID'");
    $firstname=$_POST['firstname'];
    $query = $db->query("UPDATE  users SET firstname = '$firstname' WHERE ID ='$ID'");
    $lastname=$_POST['lastname'];
    $query = $db->query("UPDATE  users SET lastname = '$lastname' WHERE ID ='$ID'");
    $tlp=$_POST['tlp'];
    $query = $db->query("UPDATE  users SET phonenumber = '$tlp' WHERE ID ='$ID'");
    if (!($_POST['login']!= $_SESSION['login'])) {
      header('location: ../configuration.php');
    }
?>
