<?php
  session_start();
  error_reporting(0);
  require_once('php/config.php');

$ID = $_SESSION['id'];
  if(isset($_SESSION['procolage2'])){
    $query = "SELECT * FROM item WHERE ID_collectionneur='$ID'";
  }
  if ($_GET['action'] == "myitems") {
    unset($_SESSION['procolage']);
    $_SESSION['procolage2']=1;
    $query = "SELECT * FROM item WHERE ID_collectionneur='$ID'";
  }
  if(isset($_SESSION['procolage'])){
    $col=$_SESSION['procolage'] ;
    $query = "SELECT * FROM ((item inner join mycollection on item.ID_c=mycollection.ID_C)
    inner join users on item.ID_collectionneur=users.ID and ID='$ID' and Name='$col')";
  }
  if ($_GET['action'] == "myitemscol") {
    unset($_SESSION['procolage2']);
    $col =$_GET['name'];
    $_SESSION['procolage']=$col ;
    $query = "SELECT * FROM ((item inner join mycollection on item.ID_c=mycollection.ID_C)
    inner join users on item.ID_collectionneur=users.ID and ID='$ID' and Name='$col')";
  }
    $result = $db->prepare($query);
    $result->execute();
    $rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>CollectionZ</title>
    <script src="js/jquery.js"></script>
    <style media="screen">

      .card{
          margin-top: 20px;
          margin-left: 20px;
          margin-bottom: 20px;
      }
      .col-md-4{ opacity: 80%}
      .info a{
        text-decoration: none;
        font-size: 15px;
        margin-left: 5px;
        background-color: #e85a4f ;
        color: white;
        border-radius: 5px;
      }
    </style>
</head>
<body>
  <?php require "include/navbar.php" ?>
  <div class="d-flex" id="wrapper">
    <?php require "include/sidebar.php" ?>
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($rows as $row): ?>
          <div class="col-md-4">
            <?php
              $id_item=$row['ID_item'];
              $query2 = "SELECT ID_Colecionneur_Prete FROM itemprete Where ID_Item='$id_item'";
              $result2 = $db->prepare($query2);
              $result2->execute();
              $rows2 = $result2->fetchAll();
             ?>
            <div class="card shadow-lg" style="width: 18rem;background-color: lavender;">
                <img class="card-img-top" src="img/<?= $row['Image'] ?>"  >
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="fas fa-images"></i> <?= $row['Titre'] ?>
                    <?php if (!$rows2): ?>
                      <a href="php/AjouteCategorie.php?action=Deleteitem&nameitem=<?= $row['ID_item'] ?>" class="float-right"><i class="fas fa-trash" style="color: #E85A4F;"></i></a>
                    <?php endif; ?>
                    <a href="modifieritem.php?id_item=<?= $row['ID_item'] ?>" class="float-right"><i class="fas fa-edit" style="color: #E85A4F;"></i>   </a>
                  </h5>
                  <p class="card-text"><?= $row['Description']  ?></p>
                  <div class="info d-flex" >
                    <a href="" class="btn" type="submit" ><i class="fab fa-stack-overflow"><?= $row['Stock'] ?></i></a>
                    <a href="" class="btn" type="submit" ><i class="fas fa-dollar-sign"><?= $row['Prix'] ?></i></a>

                     <?php if (!$rows2): ?>
                       <?php if ($row['Prété'] == true): ?>
                         <a href="php\AjouteCategorie.php?action=pretefalse&iditem=<?= $row['ID_item'] ?>" class="btn" type="submit" ><i class="fas fa-chevron-circle-left" ></i></a>
                       <?php else: ?>
                         <a href="php\AjouteCategorie.php?action=pretetrue&iditem=<?= $row['ID_item'] ?>" class="btn" type="submit" style="background-color: grey;" ><i class="fas fa-chevron-circle-left"></i></a>
                       <?php endif; ?>
                       <?php if ($row['OnVend'] == true): ?>
                         <a href="php\AjouteCategorie.php?action=vendfalse&iditem=<?= $row['ID_item'] ?>" class="btn" type="submit" ><i class="fas fa-shopping-cart"></i></a>
                       <?php else: ?>
                         <a href="php\AjouteCategorie.php?action=vendtrue&iditem=<?= $row['ID_item'] ?>" class="btn" type="submit" style="background-color: grey;" ><i class="fas fa-shopping-cart"></i></a>
                       <?php endif; ?>
                     <?php else: ?>
                       <?php
                          $id_awner=$rows2[0]['ID_Colecionneur_Prete'];
                         $query = $db->query("SELECT login FROM users where ID = '$id_awner'");
                         $rows3 = $query->fetchAll();
                        ?>
                       <a href="profil.php?id=<?= $id_awner ?>&user=<?= $rows3[0]['login'] ?>" class="btn" type="submit" ><i class="fas fa-user"> En prêt à <?= $rows3[0]['login'] ?></i></a>
                     <?php endif; ?>
                   </div>
               </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
      <?php require "include/footer.php" ?>
      <script>
        $(document).ready(function(){
          $('.col-md-4').hover(
            function(){$(this).animate({marginTop: "-=1%",opacity: "100%"},200);},
            function(){$(this).animate({marginTop: "0%",opacity: "80%"},200);}
          );
        });
      </script>
</body>
</html>
