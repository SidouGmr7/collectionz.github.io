<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style media="screen">
    body{
      background-image:url("img/back.jpg");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    </style>
  </head>
  <body>
    <div class=""style="padding-bottom: 55px;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
              <a class="navbar-brand" href="index.php">CollectionZ</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="collection.php">MarketPlace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nous-contactez.php">Nous-contacter</a>
            </li>
            <?php if (isset($_SESSION['login'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="compte.php"><?php echo $_SESSION['login']; ?></a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="Login.php">Se connecter</a>
              </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['admin'])){ ?>
              <li class="nav-item">
                <a class="nav-link" style="color: #E85A4F;" href="compte.php">admin <i class="fas fa-star"></i></a>
              </li>
            <?php } ?>
            <?php if (isset($_SESSION['login'])): ?>
              <li class="nav-item">
                <?php
                  require 'php/config.php';
                  $id = $_SESSION['id'];
                  $query9 = "SELECT * FROM `message` WHERE ID_Destinataire = '$id' and vu = '0'";
                  $result9 = $db->prepare($query9);
                  $result9->execute();
                  $rows9 = $result9->fetchAll();
                 ?>
                 <?php if ($rows9): ?>
                   <a class="nav-link" href="affichmessage.php"><i class="fas fa-bell"></i></a>
                 <?php else: ?>
                   <a class="nav-link" href="affichmessage.php"><i class="fas fa-bell-slash"></i></a>
                 <?php endif; ?>
              </li>
            <?php endif; ?>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="listitems.php" method="GET">
            <input class="form-control mr-sm-2" name="box" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>
    </div>

  </body>
</html>
