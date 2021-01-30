<?php
  session_start();
  require_once('php/config.php');
  $ID=$_SESSION['id'];

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
            <?php
                $query = "SELECT * FROM message Where ID_Destinataire='$ID'";
                $result = $db->prepare($query);
                $result->execute();
                $rows = $result->fetchAll();
                $i=-1;
                $k = 0;
             ?>
            <?php foreach ($rows as $row): ?>
              <?php if ($row['vu']): ?>
                <div class="col-sm-3" style="opacity: 40%;">
              <?php else: ?>
                <div class="col-sm-3">
              <?php endif; ?>

                <div class="card shadow-lg">
                  <div class="card-body">
                    <?php
                      $Expediteur = $row['ID_Expediteur'];
                      $query2="SELECT login from users WHERE ID = '$Expediteur'";
                      $result2 = $db->prepare($query2);
                      $result2->execute();
                      $user = $result2->fetchAll();
                      $i=$i+1;
                     ?>
                    <h5 class="card-title"><i class="fas fa-user"></i>
                      <a class="text-decoration-none" style="color:#e85a4f" href="profil.php?id=<?= $row['ID_Expediteur'] ?>&user=<?= $user[0]['login'] ?>"><?= $user[0]['login'] ?></a>
                      <a href="php/AjouteCategorie.php?action=Deletemessage&name=<?= $row['ID'] ?>" class="float-right"style="color: #e85a4f;"><i class="fas fa-trash"></i></a>
                    </h5>
                    <div class="card-text">
                      <div class="form-group">
                        <div class="col-md-15 input-group m-2">
                          <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fas fa-puzzle-piece"></i></div>
                           </div>
                           <p class="form-control"><?= $row['Objet'] ?></p>
                        </div>
                        <div class="col-md-22 input-group m-2">
                          <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fas fa-digital-tachograph"></i></div>
                           </div>
                           <a href="php/affichemessageP.php?action=vu&id=<?= $row['ID'] ?>" type="button" id="message<?= $i ?>" class="form-control text-decoration-none">Voir le Message</a>
                           <script type="text/javascript">

                              <?php if (isset($_SESSION['vu'])): ?>

                                Swal.fire({
                                  title: '<?= $rows[$i]['Objet'] ?>',
                                  text: '<?= $rows[$i]['Message'] ?>',
                                  icon: 'info'
                                });

                                <?php unset($_SESSION['vu']); ?>
                              <?php endif; ?>
                           </script>
                        </div>
                        <div class="col-md-15 input-group m-2">
                          <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                           </div>
                           <p class="form-control" style="font-size: 12px;"><?= $row['time'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
      </div>
    </div>
 </div>
      <?php require "include/footer.php" ?>
      <?php require "include/alert.php" ?>
      <script>
          $(document).ready(function(){
            $('.col-sm-3').hover(
              function(){$(this).animate({marginTop: "-=1%"},200);},
              function(){$(this).animate({marginTop: "0%"},200);}
            );
          });
      </script>



</body>
</html>
