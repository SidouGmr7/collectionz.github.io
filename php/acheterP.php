<?php
require_once 'config.php';
  session_start();
  $id=$_SESSION['id'];
  $user=$_GET['user'];
  $login=$_SESSION['login'];
  if(isset($_SESSION['login'])){
    if ($_GET['action'] == "acheter"){
      $id_item=$_GET['id'];
      $query = "SELECT ID_C FROM mycollection Where ID_Collectionneur='$id' AND Name='mes Achats'";
      $result = $db->prepare($query);
      $result->execute();
      $rows = $result->fetchAll();
      if (!$rows) {
        $query = $db->prepare("INSERT INTO mycollection (ID_C, ID_Collectionneur, Name) VALUES (?,?,?)");
        $result = $query->execute([NULL, $id, 'mes Achats']);
        $query = "SELECT ID_C FROM mycollection Where ID_Collectionneur='$id' AND Name='mes Achats'";
        $result = $db->prepare($query);
        $result->execute();
        $rows = $result->fetchAll();
      }
      $id_col=$rows[0]['ID_C'];
      if ($login != $user ) {
        $query= $db->query("UPDATE  item SET ID_Collectionneur = '$id' , ID_c = '$id_col' WHERE ID_item ='$id_item'");
      }
    }
    header('location:../collection.php');
    if ($_GET['action'] == "prete"){
      $id_user=$_GET['id_user'];
      $id_item=$_GET['id'];
      $query = "SELECT ID_C FROM mycollection Where ID_Collectionneur='$id' AND Name='mes pretes'";
      $result = $db->prepare($query);
      $result->execute();
      $rows = $result->fetchAll();
      if (!$rows) {
        $query = $db->prepare("INSERT INTO mycollection (ID_C, ID_Collectionneur, Name) VALUES (?,?,?)");
        $result = $query->execute([NULL, $id, 'mes pretes']);
        $query = "SELECT ID_C FROM mycollection Where ID_Collectionneur='$id' AND Name='mes pretes'";
        $result = $db->prepare($query);
        $result->execute();
        $rows = $result->fetchAll();
      }
      $id_col=$rows[0]['ID_C'];
      $query = "SELECT ID_Item FROM itemprete Where ID_Item='$id_item'";
      $result = $db->prepare($query);
      $result->execute();
      $rows = $result->fetchAll();
      if ($login != $user && !$rows ) {
        $query = $db->prepare("INSERT INTO itemprete (ID_Item	, ID_Colectionneur, ID_Colecionneur_Prete) VALUES (?,?,?)");
        $result = $query->execute([$id_item, $id_user,$id ]);
      }
    }
    $query = $db->query("UPDATE item SET OnVend = 0 WHERE ID_item ='$id_item'");
    $query = $db->query("UPDATE item SET Prété = 0 WHERE ID_item ='$id_item'");
    header('location:../collection.php');
  }else {
    header('location:../Signup.php');
  }


 ?>
