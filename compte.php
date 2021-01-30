<?php
  session_start();
  $id= $_SESSION['id'];
  require_once('php/config.php');
  $query= "SELECT * FROM users WHERE ID = '$id'";
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
    <style media="screen">
      .col-md-7 .form-control{
        height: 50px;
        font-size: 22px;
      }
    </style>

</head>
<body>
  <?php require "include/navbar.php" ?>
     <div class="d-flex" id="wrapper">
       <?php require "include/sidebar.php" ?>
       <div class="container-fluid">
         <div class="card-body">
           <h2 class="mt-4" style="color: #E85A4F;">Mes informations</h2>
           <hr class="hr-light">
           <div class="form-group">
             <div class="col-md-7 input-group m-3">
               <div class="input-group-prepend">
                  <div class="input-group-text">
                    <?php if (isset($_SESSION['admin'])): ?>
                      <i class="fas fa-user-tie"></i>
                    <?php else: ?>
                      <i class="fas fa-user"></i>
                    <?php endif; ?>
                    </div>
                </div>
                <p class="form-control"><?= $rows[0]['firstname'] ?></p>
             </div>
           </div>
           <hr class="hr-light col-md-7 m-3 float-left" ><br>
             <div class="form-group">
               <div class="col-md-7 input-group m-3">
                 <div class="input-group-prepend">
                    <div class="input-group-text "><i class="fas fa-user"></i></div>
                  </div>
                  <p class="form-control"><?= $rows[0]['lastname'] ?></p>
               </div>
             </div>
             <hr class="hr-light col-md-7 m-3 float-left" ><br>
             <div class="form-group">
               <div class="col-md-7 input-group m-3">
                 <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                  </div>
                  <p class="form-control"><?= $rows[0]['email'] ?></p>
               </div>
             </div>
             <hr class="hr-light col-md-7 m-3 float-left" ><br>
             <div class="form-group">
               <div class="col-md-7 input-group m-3">
                 <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                  </div>
                  <p class="form-control"><?= $rows[0]['phonenumber'] ?></p>
               </div>
             </div>
             <hr class="hr-light">
         </div>
        </div>
      </div>
      <?php require "include/footer.php" ?>

</body>
</html>
