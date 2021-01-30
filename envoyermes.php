<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style media="screen">
      .form{background-color: #ffffff;}
      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }
      h1 , p {color: #E85A4F;}
    </style>
</head>
<body>
  <?php require "include/navbar.php" ?>
    <div class="d-flex" id="wrapper">
      <?php require "include/sidebar.php" ?>
        <div id="page-content-wrapper">
          <div class="container-fluid">
               <h1>Envoyer un message</h1><br>
               <form action="php/EnvoyermessageP.php" method="post">
                 <div class="form-group">
                   <div class="col-md-9 input-group m-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <?php if ($_GET['action'] == "fromprofil") : ?>
                        <input id="destinataire" name="destinataire" type="text" value="<?= $_GET['user'] ?>" class="form-control">
                      <?php else: ?>
                        <input id="destinataire" name="destinataire" type="text" placeholder="Destinataire" class="form-control">
                      <?php endif; ?>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-9 input-group m-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-puzzle-piece"></i></div>
                      </div>
                      <input id="objet" name="objet" type="text" placeholder="Objet du message" class="form-control">
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-9 input-group m-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-digital-tachograph"></i></div>
                      </div>
                      <textarea class="form-control" id="message" name="message" placeholder="Veuillez entrer votre message ici..." rows="5"></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-12 text-right button">
                     <a class="btn submit" href="affichmessage.php">Afficher les messages</a>
                     <input type="submit" name="envoye" class="btn submit">
                   </div>
                 </div>
               </form>
          </div>
        </div>
    </div>
    <?php require "include/footer.php" ?>
    <?php require "include/alert.php" ?>
</body>
</html>
