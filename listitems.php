<?php
      session_start();
      require_once('php/config.php');
      error_reporting(0);
      $ID = $_SESSION['id'];
      if ($_GET['action'] == "cat") {
        $cat =$_GET['name'];
        $query = "SELECT * FROM item inner join catégorie on item.ID_cat=catégorie.ID_Cat and Name='$cat' and Onvend = '1'";
      }

      if ($_GET['box']) {
        $box=$_GET['box'];
        $query = "SELECT * FROM item WHERE Titre='$box'";
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
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Collection Z</title>
    <script src="js/jquery.js"></script>
    <style media="screen">
      .card{opacity: 90%; margin-bottom: 30px;}
      .btn{margin-left: 5px;}
      .col-md-4{margin-top: 20px;}
      .card-title{color: #e85a4f;font-size: 20px;}
      .info a{
        text-decoration: none;
        font-size: 15px;
        margin-left: 5px;
        background-color: #e85a4f ;
        color: white;
        border-radius: 5px;
      }
      .card-img-top{
        height: 300px;
      }
    </style>
  </head>
  <body>
    <?php require "include/navbar.php" ?>
  <div class="container">
    <div class="row justify-content-center">
      <?php if ($rows[0]): ?>
      <?php foreach ($rows as $row): ?>
        <div class="col-md-4">
          <div class="card shadow-lg" style="width: 18rem;background-color: lavender;">
            <img class="card-img-top" src="img/<?= $row['Image'] ?>"  >
              <div class="card-body">
                <?php
                  $login = $row['ID_Collectionneur'];
                  $query2="SELECT login from users WHERE ID = '$login'";
                  $result2 = $db->prepare($query2);
                  $result2->execute();
                  $user = $result2->fetchAll();
                 ?>
              <div class="card-title">
                <i class="fas fa-images"></i> <?= $row['Titre'] ?>
                <div class="float-right">
                  <i class="fas fa-user white-text"></i>
                  <a class="text-decoration-none" style="color:#e85a4f" href="profil.php?id=<?= $login ?>&user=<?= $user[0]['login'] ?>"><?= $user[0]['login'] ?></a>

                </div>
              </div>
              <p class="card-text"><?= $row['Description'] ?></p>
              <div class="info d-flex" >
                <a href="" class="btn" type="submit" ><i class="fab fa-stack-overflow"><?= $row['Stock'] ?></i></a>
                <a href="" class="btn" type="submit" ><i class="fas fa-dollar-sign"><?= $row['Prix'] ?></i></a>
                <?php if($row['Prété']){  ?>
                  <a href="php/acheterP.php?action=prete&id=<?= $row['ID_item'] ?>&user=<?= $user[0]['login']?>&id_user=<?= $login  ?>" class="btn" type="submit" name="prete"><i class="fas fa-chevron-circle-left"></i></a>
                <?php } ?>
                <a href="php/acheterP.php?action=acheter&id=<?= $row['ID_item'] ?>&user=<?= $user[0]['login']?>" class="btn" type="submit" name="acheter"><i class="fas fa-shopping-cart"></i></a>
                <?php if (isset($_SESSION['admin'])): ?>
                  <a href="php/AjouteCategorie.php?action=Deleteitem&nameitem=<?= $row['ID_item'] ?>" class="float-right btn"><i class="fas fa-trash"></i></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php else: ?>
        <?php
        if ($_GET['box']) {
          $box=$_GET['box'];
          $_SESSION['recharchevide']=1;
        }

        if ($_GET['action'] == "cat") {
          $_SESSION['catégorievide']=1;
        }
          header('location:collection.php');
        ?>
      <?php endif; ?>

    </div>
  </div>
  <?php require "include/footer.php" ?>
  <script>
    $(document).ready(function(){
      $('.card').hover(
        function(){$(this).animate({marginTop: "-=2%",opacity : "100%"},200);},
        function(){$(this).animate({marginTop: "0%",opacity : "90%"},200);}
      );
    });
  </script>
  </body>
</html>
