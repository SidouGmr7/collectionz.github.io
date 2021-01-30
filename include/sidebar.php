

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="js/jquery.js"></script>
  <style media="screen">
  .list-group-flush i{
    padding: 10px;
  }
  body{
    /*background-image:url("img/cool-background.png");*/
    background-repeat: no-repeat;
    background-size: 100% 100%;
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
    <div class="bg-dark" id="sidebar-wrapper" >
      <div style="margin-top: 50px;">
        <div class="sidebar-heading">
          <a class="list-group-item list-group-item-action bg-dark" href="compte.php" style="color: white">
            <?php if (isset($_SESSION['admin'])): ?>
              <i class="fas fa-user-tie"></i>
            <?php else: ?>
              <i class="fas fa-user"></i>
            <?php endif; ?>
             <?php echo $_SESSION['login']; ?>
           </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="envoyermes.php" class="list-group-item list-group-item-action bg-dark" style="color: white"><i class="fas fa-envelope "></i> Message</a>
          <a href="amis.php" class="list-group-item list-group-item-action bg-dark" style="color: white"><i class="fas fa-user-friends"></i> Amis</a>
          <a href="espace_membre.php" class="list-group-item list-group-item-action bg-dark" style="color: white"><i class="fas fa-archive"></i> Collections</a>
          <a href="configuration.php" class="list-group-item list-group-item-action bg-dark" style="color: white"><i class="fas fa-edit "></i> Configuration</a>
          <a href="destroy.php" class="list-group-item list-group-item-action bg-dark" style="color: white"><i class="fas fa-power-off"></i> Deconnexion</a>
        </div>
      </div>

    </div>
</body>
</html>
