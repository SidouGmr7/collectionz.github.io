<?php
  session_start();
  require_once('php/config.php');
  $id_item = $_GET['id_item'];

    $query= "SELECT * FROM item WHERE ID_item = '$id_item'";
    $result = $db->prepare($query);
    $result->execute();
    $rows = $result->fetchAll();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SING UP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <style media="screen">
      .col-md-10{
        margin-left: 120px;
      }

    </style>
  </head>
  <body>
    <?php require "include/navbar.php" ?>
    <div class="d-flex" id="wrapper">
      <?php require "include/sidebar.php" ?>
      <div id="page-content-wrapper">
       <div class="container-fluid">

             <div class="row mt-4">
               <div class="col-md-10 col-xl-7 mb-4" >
                   <form  action="php/modifierItemP.php" method="post" class="col-md-10 mt-5" enctype="multipart/form-data">
                     <div class="card wow fadeInRight shadow" data-wow-delay="0.3s">
                       <div class="card-body" >
                         <!--Header-->
                         <div class="text-center">
                           <h3 class="white-text"style="color : #E85A4F;">
                             <i class="fas fa-user white-text"></i> Item :</h3>
                           <hr class="hr-light">
                         </div>
                         <!--Body-->
                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                             <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">@</span>
                           </div>
                           <input type="text" name="id_item" id="id_item" class="white-text form-control" value="<?= $rows[0]['ID_item'] ?>">
                         </div>
                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                             <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">@</span>
                           </div>
                           <input type="text" name="titre" id="titre" class="white-text form-control" value="<?= $rows[0]['Titre'] ?>">
                         </div>
                         <div class="d-flex">
                           <div class="input-group mb-3">
                             <?php
                               $query= "SELECT * FROM catégorie";
                               $result = $db->prepare($query);
                               $result->execute();
                               $rows2 = $result->fetchAll();
                              ?>
                            <div class="input-group-prepend">
                              <label style="background-color: #E85A4F; color: white;" class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                            </div>
                            <select class="custom-select" name="Catégorie">

                              <?php foreach ($rows2 as $row): ?>
                                <option value="<?= $row['Name'] ?>"> <?= $row['Name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="input-group mb-3" style="margin-left: 10px">
                            <?php
                              $ID=$_SESSION['id'];
                              $query= "SELECT * FROM mycollection WHERE ID_collectionneur='$ID'";
                              $result = $db->prepare($query);
                              $result->execute();
                              $rows3 = $result->fetchAll();
                             ?>
                           <div class="input-group-prepend">
                             <label style="background-color: #E85A4F; color: white;" class="input-group-text" for="inputGroupSelect01">Collection</label>
                           </div>
                           <select class="custom-select" name="Collection">
                             <?php foreach ($rows3 as $row): ?>
                               <option value="<?= $row['Name'] ?>"> <?= $row['Name'] ?></option>
                             <?php endforeach; ?>
                           </select>
                         </div>
                      </div>
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">Stock</span>
                         </div>
                         <input type="text" name="Stock" id="Stock" class="white-text form-control" value="<?= $rows[0]['Stock'] ?>">
                         <div class="input-group-prepend"style="margin-left: 10px">
                           <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">Prix</span>
                         </div>
                         <input type="text" name="Prix" id="Prix" class="white-text form-control" value="<?= $rows[0]['Prix'] ?>">
                       </div>
                       <div class="md-form">
                          <i class="fas fa-pencil-alt prefix"></i>
                          <input type="textarea" rows="3" name="Description" class="md-textarea form-control" value="<?= $rows[0]['Description'] ?>">
                       </div>
                        <br>
                       <div class="text-center mt-4">
                         <input type="submit" name="Appliquer" id="Appliquer" value="Appliquer" class="btn submit">
                       </div>
                         </div>
                       </div>
                     </div>
                   </form>
               </div>
             </div>
           </div>
         </div>
        </div>

    <?php require "include/footer.php" ?>
    <?php require "include/alert.php" ?>

  </body>
</html>
