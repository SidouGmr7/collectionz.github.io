<?php
  session_start();
  $id= $_SESSION['id'];
  require_once('php/config.php');
  $user= $_GET['user'];
  $query= "SELECT ID FROM users WHERE login = '$user'";
  $result = $db->prepare($query);
  $result->execute();
  $rows = $result->fetchAll();
  $profil_id=$rows[0]['ID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>CollectionZ</title>
    <style media="screen">
      .col-md-20 .form-control{
        height: 50px;
        font-size: 22px;

      }
      .button a{
         text-decoration: none;
         font-size: 20px;
         background-color: #e85a4f ;
         color: white;
         border-radius: 5px;
         margin-left: 5px;
      }
      .button{
        margin-top: 35px;
        margin-right: 130px;
      }
      .card{
          margin-top: 20px;
          margin-left: 20px;
          margin-bottom: 20px;
      }
      .col-md-4{ opacity: 80%;}
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
       <div class="container-fluid">
          <div class="d-flex">
            <div class="card-body">
              <?php
                $query= "SELECT * FROM users WHERE ID = '$profil_id'";
                $result = $db->prepare($query);
                $result->execute();
                $rows = $result->fetchAll();
               ?>
              <h2 class="mt-4" style="color: #E85A4F;">Les informations</h2>
              <hr class="hr-light" >
              <div class="d-flex m-3">
                <div class="form-group">
                  <div class="col-md-20 input-group m-4">
                    <div class="input-group-prepend">
                       <div class="input-group-text"><i class="fas fa-user"></i></div>
                     </div>
                     <p class="form-control"><?= $rows[0]['firstname'] ?></p>
                  </div>
                  <div class="col-md-20 input-group m-4">
                    <div class="input-group-prepend">
                       <div class="input-group-text "><i class="fas fa-user"></i></div>
                     </div>
                     <p class="form-control"><?= $rows[0]['lastname'] ?></p>
                  </div>
                </div>
                  <div class="form-group" style="margin-left: 30px;">
                    <div class="col-md-20 input-group m-4">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                       </div>
                       <p class="form-control"><?= $rows[0]['email'] ?></p>
                    </div>
                    <div class="col-md-20 input-group m-4">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-phone"></i></div>
                       </div>
                       <p class="form-control"><?= $rows[0]['phonenumber'] ?></p>
                    </div>
                  </div>
              </div>
              <hr class="hr-light" >

            </div>
            <div class="button">
              <a href="#" class="btn"><?= $user  ?></a>
              <a href="envoyermes.php?action=fromprofil&user=<?= $user  ?>" class="btn"><i class="fas fa-envelope"></i></a>
              <?php
                $query = "SELECT état FROM admin where ID_user = '$profil_id' and état = '1'";
                $result= $db->prepare($query);
                $result->execute();
                $rows = $result->fetchAll();
               ?>
              <?php if ($rows): ?>
                <a href="#" class="btn">admin <i class="fas fa-star"></i></a>
              <?php endif; ?>
              <?php
                $login = $_SESSION['login'];
                $query = $db->query("SELECT * FROM ami where (Colectionneur='$login' or Colectionneur='$user') and (Colectionneur_ami = '$login' or Colectionneur_ami = '$user') and état = '1'");
                $rows = $query->fetchAll();
               ?>
               <?php if ($rows): ?>
                 <a href="#" class="btn"><i class="fas fa-user-check"></i></a>
               <?php else: ?>
                 <a href="amisP.php?action=add&login=<?= $user ?>" class="btn"><i class="fas fa-user-plus"></i></a>
               <?php endif; ?>


            </div>
          </div>
          <h2 class="mt-4" style="color: #E85A4F;">Les items</h2>

          <div class="row justify-content-center">
            <?php
              $query = "SELECT * FROM item where ID_Collectionneur='$profil_id'";
              $result = $db->prepare($query);
              $result->execute();
              $rows = $result->fetchAll();
              ?>
            <?php foreach ($rows as $row): ?>
              <div class="col-md-4">
                <div class="card shadow-lg" style="width: 18rem;">
                    <img class="card-img-top" src="img/<?= $row['Image'] ?>"  >
                    <div class="card-body">
                      <h5 class="card-title">
                        <i class="fas fa-images"></i> <?= $row['Titre'] ?>
                        <a href="php/AjouteCategorie.php?action=Deleteitem&nameitem=<?= $row['ID_item'] ?>" class="float-right"><i class="fas fa-trash" style="color: #E85A4F;"></i></a>
                      </h5>
                      <p class="card-text"><?= $row['Description']  ?></p>
                      <div class="info d-flex" >
                        <a href="" class="btn" type="submit" ><i class="fab fa-stack-overflow"><?= $row['Stock'] ?></i></a>
                        <a href="" class="btn" type="submit" ><i class="fas fa-dollar-sign"><?= $row['Prix'] ?></i></a>
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
