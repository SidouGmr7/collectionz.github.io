<?php
  require_once ('../php/config.php');
  session_start();
  $id= $_SESSION['id'];
 ?>
 <?php
 if (isset($_SESSION['id']) AND !empty($_SESSION['id'])){
   $_SESSION['additem']=1;
  $titre=$_POST['titre'];
  $categorie=$_POST['Catégorie'];
  $collection=$_POST['Collection'];
  $stock=$_POST['stock'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
    if (isset($_POST['vend'])){
        $vend=1;
    }
    else{
        $vend=0;
    }
    if(isset($_POST['prete'])){
        $prete=1;
    }
    else{
        $prete=0;
    }

    $images=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $imageSize=$_FILES['image']['size'];

    $upload_dir='';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg','jpg','png','gif');
    $pic=rand(1000,1000000).".".$imgExt;
    move_uploaded_file($tmp_dir,$upload_dir.$pic);

    $id_categorie= $db->prepare("SELECT ID_Cat FROM catégorie WHERE Name='$categorie'");
    $id_categorie->execute();
    $id_cat=$id_categorie->fetch();
    $cat=$id_cat['ID_Cat'];

    $id_collection= $db->prepare("SELECT ID_C FROM mycollection WHERE Name='$collection'");
    $id_collection->execute();
    $id_col=$id_collection->fetch();
    $col=$id_col['ID_C'];

    $query="INSERT INTO item (ID_Collectionneur,ID_cat ,ID_c,Titre,Prix,Prété,OnVend,Stock,Date,Description,Image) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $insert=$db->prepare($query);
    $result=$insert->execute([$id,$cat,$col,$titre,$prix,$prete,$vend,$stock,date("Y/m/d"),$description,$pic]);
    }
    header('location:../AjouterItem.php');
    ?>
