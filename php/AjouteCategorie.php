
<?php
    require_once 'config.php';
      session_start();
      $id=$_SESSION['id'];
    if (isset($_GET['col'])) {
      $cat=$_GET['col'];
      $query = $db->prepare("INSERT INTO mycollection(ID_collectionneur , Name) VALUES (?,?)");
      $result = $query->execute([$_SESSION['id'] ,$_GET['col']]);
      header('location:../espace_membre.php');
      $_SESSION['addcol']=1;
    }
    if (isset($_GET['col_name'])) {
      $col_name=$_GET['col_name'];
      $col_id=$_GET['col_id'];
      $query = $db->query("UPDATE mycollection SET Name = '$col_name' WHERE ID_C ='$col_id'");
      header('location:../espace_membre.php');

    }

    if ($_GET['action'] == "Delete") {
      $id=$_GET['name'];
      $query = $db->query("DELETE FROM mycollection WHERE ID_C ='$id'");
      header('location:../espace_membre.php');
      $_SESSION['Deletecol']=1;
    }
    if ($_GET['action'] == "Deleteitem") {
      $id=$_GET['nameitem'];
      $query = $db->query("DELETE FROM item WHERE ID_item ='$id'");
      header('location:../espace_membre.php');
    }
    if ($_GET['action'] == "Deletemessage") {
      $id=$_GET['name'];
      $query = $db->query("DELETE FROM message WHERE ID ='$id'");
      header('location:../affichmessage.php');
      $_SESSION['Deletemes']=1;
    }
    /* clique button for disable or enable Onvent   and prété*/
    if ($_GET['action'] == "vendtrue") {
      $id=$_GET['iditem'];
      $query = $db->query("UPDATE item SET OnVend = 1 WHERE ID_item ='$id'");
      header('location:../myitems.php');
    }
    if ($_GET['action'] == "vendfalse") {
      $id=$_GET['iditem'];
      $query = $db->query("UPDATE item SET OnVend = 0 WHERE ID_item ='$id'");
      header('location:../myitems.php');
    }
    if ($_GET['action'] == "pretetrue") {
      $id=$_GET['iditem'];
      $query = $db->query("UPDATE item SET Prété = 1 WHERE ID_item ='$id'");
      header('location:../myitems.php');
    }
    if ($_GET['action'] == "pretefalse") {
      $id=$_GET['iditem'];
      $query = $db->query("UPDATE item SET Prété = 0 WHERE ID_item ='$id'");
      header('location:../myitems.php');
    }
    if ($_GET['action'] == "Retourner") {
      $user=$_GET['original'];
      $id_item=$_GET['id_item'];
        $query = $db->query("DELETE FROM itemprete WHERE ID_Item ='$id_item'");
      header('location:../infoprete.php');
    }


 ?>
