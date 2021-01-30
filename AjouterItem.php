<?php
  session_start();
  require_once('php/config.php');

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
                   <form  action="img/AjouterItemP.php" method="post" class="col-md-10 mt-5" enctype="multipart/form-data">
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
                           <input type="text" name="titre" id="titre" class="white-text form-control" placeholder="Titre">
                         </div>
                         <div class="d-flex">
                           <div class="input-group mb-3">
                             <?php
                               $query= "SELECT * FROM catégorie";
                               $result = $db->prepare($query);
                               $result->execute();
                               $rows = $result->fetchAll();
                              ?>
                            <div class="input-group-prepend">
                              <label style="background-color: #E85A4F; color: white;" class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                            </div>
                            <select class="custom-select" name="Catégorie">

                              <?php foreach ($rows as $row): ?>
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
                              $rows = $result->fetchAll();
                             ?>
                           <div class="input-group-prepend">
                             <label style="background-color: #E85A4F; color: white;" class="input-group-text" for="inputGroupSelect01">Collection</label>
                           </div>
                           <select class="custom-select" name="Collection">

                             <?php foreach ($rows as $row): ?>
                               <option value="<?= $row['Name'] ?>"> <?= $row['Name'] ?></option>
                             <?php endforeach; ?>
                           </select>
                         </div>
                      </div>

                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">Stock</span>
                         </div>
                         <input type="text" name="stock" id="stock" class="white-text form-control" placeholder="20..">
                         <div class="input-group-prepend"style="margin-left: 10px">
                           <span style="background-color: #E85A4F; color: white;" class="input-group-text" id="basic-addon1">Prix</span>
                         </div>
                         <input type="text" name="prix" id="prix" class="white-text form-control" placeholder="25..">
                       </div>
                      <div class="d-flex">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="vend" class="custom-control-input" id="defaultChecked2">
                          <label class="custom-control-label" for="defaultChecked2">Mettre en vente</label>
                        </div>
                        <div class="custom-control custom-checkbox" style="margin-left: 10px">
                          <input type="checkbox"name="prete" class="custom-control-input" id="defaultChecked1">
                          <label class="custom-control-label" for="defaultChecked1">Possibilite de pret</label>
                        </div>
                      </div>
                       <div class="md-form">
                          <i class="fas fa-pencil-alt prefix"></i>
                          <textarea id="form10" class="md-textarea form-control" rows="3" name="description"></textarea>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                         <div class="custom-file">
                          <label  for="file" class="custom-file-label">Choises un image</label>
                          <input type="file" name="image" class="custom-file-input">
                         </div>
                       </div>
                       <div class="text-center mt-4">
                         <input type="submit" name="Ajouter" id="Ajouter" value="Ajouter" class="btn submit">
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
