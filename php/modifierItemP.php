<?php
  session_start();
  require_once 'config.php';
    $id_item=$_POST['id_item'];

    $titre=$_POST['titre'];
    $query = $db->query("UPDATE  item SET Titre = '$titre' WHERE ID_item ='$id_item'");

    $Stock=$_POST['Stock'];
    $query = $db->query("UPDATE  item SET Stock = '$Stock' WHERE ID_item ='$id_item'");

    $Prix=$_POST['Prix'];
    $query = $db->query("UPDATE  item SET Prix = '$Prix' WHERE ID_item ='$id_item'");

    $Description=$_POST['Description'];
    $query = $db->query("UPDATE  item SET Description = '$Description' WHERE ID_item ='$id_item'");

    $categorie=$_POST['Catégorie'];
    $id_categorie= $db->prepare("SELECT ID_Cat FROM catégorie WHERE Name='$categorie'");
    $id_categorie->execute();
    $id_cat=$id_categorie->fetch();
    $cat=$id_cat['ID_Cat'];
    $query = $db->query("UPDATE  item SET ID_cat = '$cat' WHERE ID_item ='$id_item'");

    $collection=$_POST['Collection'];
    $id_collection= $db->prepare("SELECT ID_C FROM mycollection WHERE Name='$collection'");
    $id_collection->execute();
    $id_col=$id_collection->fetch();
    $col=$id_col['ID_C'];
    $query = $db->query("UPDATE  item SET ID_c = '$col' WHERE ID_item ='$id_item'");

      header('location: ../myitems.php');
?>
