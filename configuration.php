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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h1 , p {color: #e85a4f;}

    </style>
  </head>
<body>
  <?php require "include/navbar.php" ?>
<div class="d-flex" id="wrapper">
  <?php require "include/sidebar.php" ?>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <form action="php/configurationP.php" method="POST">
          <h1>Modifier vos information</h1>
          <p>Besoin d'une information ou signalez un probleme? Vous étes au bon endroit!  </p>
          <div class="form-group">
            <div class="col-md-9 input-group m-2">
              <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-users-cog"></i></div>
               </div>
              <input id="login" name="login" type="text" value="<?= $_SESSION['login'] ?>" class="form-control">
              <div class="input-group-prepend">
                 <div class="input-group-text">Login</div>
               </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 input-group m-2">
              <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-user-cog"></i></div>
               </div>
               <input id="firstname" name="firstname" type="text" value="<?= $rows[0]['firstname'] ?>" class="form-control">
               <div class="input-group-prepend">
                  <div class="input-group-text">Nome</div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 input-group m-2">
              <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-user-cog"></i></div>
               </div>
               <input id="lastname" name="lastname" type="text" value="<?= $rows[0]['lastname'] ?>" class="form-control">
               <div class="input-group-prepend">
                  <div class="input-group-text">Prénome</div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 input-group m-2">
              <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-wrench"></i></div>
               </div>
               <input id="email" name="email" type="text" value="<?= $rows[0]['email'] ?>" class="form-control">
               <div class="input-group-prepend">
                  <div class="input-group-text">Email</div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 input-group m-2">
              <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-wrench"></i></div>
               </div>
               <input id="tlp" name="tlp" type="text" value="<?= $rows[0]['phonenumber'] ?>" class="form-control">
               <div class="input-group-prepend">
                  <div class="input-group-text">Numéro de Télephone</div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 text-right">
              <input type="Submit" name="Submit" value="Submit" class="btn submit">
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<?php require "include/footer.php" ?>


</body>
</html>
