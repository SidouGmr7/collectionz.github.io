<?php
  session_start();
  require_once('php/config.php');
  $ID=$_SESSION['id'];
  $query = "SELECT * FROM mycollection Where ID_collectionneur='$ID'";
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
    <title>CollectionZ</title>

    <style media="screen">
      .row{
        padding-left: 100px;
        padding-bottom: 20px;
      }
      .col-sm-3{
        margin-right: 20px;

      }
      .card{
        margin-top: 20px;
      }
      input{
        border: none;
      }

      h6 ,h5{color: #E85A4F;  }
      .button a{
         text-decoration: none;
         font-size: 20px;
         background-color: #e85a4f ;
         color: white;
         border-radius: 5px;
         margin-left: 40px;
      }
      .button{
        margin-top: 20px;
        margin-right: 200px;
      }

    </style>
</head>
<body>
  <?php require "include/navbar.php" ?>
  <div class="d-flex" id="wrapper">
    <?php require "include/sidebar.php" ?>
      <div id="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="button">
            <a href="myitems.php?action=myitems" class="btn">Voir Tout les Items</a>
            <a href="AjouterItem.php" class="btn ">Ajouter Un Items</a>
          </div>
          <div class="row">
            <?php foreach ($rows as $row): ?>
              <div class="col-sm-3">
                <div class="card shadow-lg">
                  <div class="card-body">
                    <?php if ($row['Name'] == "mes Achats" || $row['Name'] == "mes pretes" ): ?>
                      <h5 class="card-title" >
                        <i class="fas fa-archive"></i>
                      <?= $row['Name'] ?>
                    <?php else: ?>
                      <h5 class="card-title d-flex" >
                        <i class="fas fa-archive"></i>
                      <form action="php/AjouteCategorie.php" method="GET">
                        <input type="text" name="col_name" value="<?= $row['Name'] ?>" style="width: 133px;color: #e85a4f">
                        <input type="hidden" name="col_id" value="<?= $row['ID_C'] ?>" style="width: 140px;color: #e85a4f">
                      </form>
                    <?php endif; ?>
                      <a href="php/AjouteCategorie.php?action=Delete&name=<?= $row['ID_C'] ?>" class="float-right" style="color: #e85a4f;"><i class="fas fa-trash"></i></a>
                    </h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <?php if ($row['Name']=='mes pretes'): ?>
                      <a href="infoprete.php" class="btn" style="background-color: #e85a4f;font-size: 20px;color: white;border-radius: 5px;">Entrer</a>
                    <?php else: ?>
                    <a href="myitems.php?action=myitemscol&name=<?= $row['Name'] ?>" class="btn" style="background-color: #e85a4f;font-size: 20px;color: white;border-radius: 5px;">Entrer</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <form class="col-sm-3" action="php/AjouteCategorie.php" method="GET">
              <div class="card shadow-lg">
                <div class="card-body">
                  <h6 class="card-title d-flex">
                    <input type="text" name="col" placeholder="here" style="width: 190px;">
                    <i class="fas fa-plus-circle"></i>
                  </h6>
                  <p class="card-text">Donnez un nom de votre collection que vous souhaitez ajouter</p>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
 </div>
      <?php require "include/footer.php" ?>
      <?php require "include/alert.php" ?>
      <script>
        $(document).ready(function(){
          $('.col-sm-3').hover(
            function(){$(this).animate({marginTop: "-=1%",opacity: "80%"},200);},
            function(){$(this).animate({marginTop: "0%",opacity: "100%"},200);}
          );
        });
      </script>
</body>
</html>
