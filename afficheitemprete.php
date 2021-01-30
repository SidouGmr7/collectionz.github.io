<?php
  session_start();
  error_reporting(0);
  require_once('php/config.php');
  $ID = $_SESSION['id'];
  $id_item = $_GET['id_item'];
  $query = $db->query("SELECT * FROM item WHERE ID_item = '$id_item'");
  $rows = $query->fetchAll();
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
      .col-md-4{ opacity: 80%; margin-left: 300px;}
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
      <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card shadow-lg" style="width: 18rem;">
                <img class="card-img-top" src="img/<?= $rows[0]['Image'] ?>"  >
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="fas fa-images"></i> <?= $rows[0]['Titre'] ?>
                    <a href="php/AjouteCategorie.php?action=Deleteitem&nameitem=<?= $rows[0]['ID_item'] ?>" class="float-right"><i class="fas fa-trash" style="color: #E85A4F;"></i></a>
                  </h5>
                  <p class="card-text"><?= $row['Description']  ?></p>
                  <div class="info d-flex" >
                    <a href="" class="btn" type="submit" ><i class="fab fa-stack-overflow"><?= $rows[0]['Stock'] ?></i></a>
                    <a href="" class="btn" type="submit" ><i class="fas fa-dollar-sign"><?= $rows[0]['Prix'] ?></i></a>
                   </div>
               </div>
            </div>
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
