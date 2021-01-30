<!--<?php session_start(); error_reporting(0);?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>CollectionZ</title>
    <style media="screen">

      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;

      }
      .form{
          display: flex;
          justify-content: center;
          height: 100vh;
      }
      .principal{
          width: 75%;
          margin-top: 58px;
      }
      .form-control{
        background-color: lavender;
      }
      .submit{
        text-decoration: none;
        font-size: 20px;
        background-color: #e85a4f ;
        color: white;
        border-radius: 5px;
      }
    </style>
</head>
<body>
    
        <div class="form">
          <div class="principal">
              <h1 style="color: #e85a4f;">Contactez-nous</h1>
              <p style="color: #e85a4f;">Besoin dune information ou signalez un probleme? Vous etes au bon endroit!  </p>
              <div class="form-group">
                <div class="col-md-9">
                  <?php if($_SESSION['login']) {?>
                  <input id="name" name="name" type="text" class="form-control" value="<?= $_SESSION['login']  ?>">
                  <?php }else{?>
                  <input id="name" name="name" type="text" placeholder="votre Nome" class="form-control">
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9">
                  <?php if($_SESSION['login']) {?>
                  <input id="email" name="email" type="text" class="form-control" value="<?= $_SESSION['email']  ?>">
                  <?php }else{?>
                  <input id="email" name="email" type="text" placeholder="votre Mail" class="form-control">
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9">
                  <textarea class="form-control" id="message" name="message" placeholder="Veuillez entrer votre message ici..." rows="5"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 text-right">
              

                 
                    <a class="btn submit" href="php/AdminP.php">Postuler pour devenir administrateur</a>
                 

                  <button type="submit" class="btn submit"><i class="fas fa-paper-plane"></i></button>
                </div>
              </div>
          </div>
        </div>
    
</body>
</html>
