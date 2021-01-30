<?php session_start();

require_once 'php/config.php';
$login = $_SESSION['login'];
$query = "SELECT * FROM ami where Colectionneur = '$login' or Colectionneur_ami = '$login'";
$result = $db->prepare($query);
$result->execute();
$row = $result->fetchAll();
$user_chek[]= $login

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CollectionZ</title>
    <style media="screen">

      .content-table{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        overflow: hidden;

      }
      .content-table thead tr{
        background-color: #E85A4F;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
      }
      .content-table th,
      .content-table td{
        padding: 12px 15px ;
      }
      .content-table tbody tr{
        border-bottom: 1px solid #dddddd;
      }
      .content-table tbody tr:nth-of-type(even){
        background-color: #f3f3f5;
      }
      .content-table tbody tr:nth-of-type(odd){
        background-color: #ffffff;
      }
      .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #E85A4F;
      }
      .content-table tbody tr.active-row{
        font-weight: bold;
        color: #E85A4F;
      }
      .content-table tbody tr .active-row{
        font-weight: bold;
        color: #E85A4F;
      }
      .text-decoration-none{color :#E85A4F;}
      .a{
        display: flex;
        margin-left: 150px;
      }
      h1{color: #E85A4F;}
      table{
        opacity: 60%;
      }
    </style>
</head>
<body>
      <?php require "include/navbar.php" ?>
       <div class="d-flex" id="wrapper">
         <?php require "include/sidebar.php" ?>
         <div id="page-content-wrapper">
          <div class="container-fluid">
              <div class="a">
                <div class="">
                  <h1>Liste d'amis</h1>
                  <table class="content-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Utilisateurs</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        for ($i=0; $i < sizeof($row) ; $i++) {
                          if ($row[$i]['Colectionneur'] == $login) {
                            $user_chek[]= $row[$i]['Colectionneur_ami'];
                            if ($row[$i]['état']) {
                              ?><tr>
                                <td><?= $row[$i]['ID_Ami'] ?></td>
                                <td><a href="profil.php?user=<?= $row[$i]['Colectionneur_ami'] ?>" class="text-decoration-none"><?= $row[$i]['Colectionneur_ami'] ?></a></td>
                                <td><a href="amisP.php?action=delete&id=<?= $row[$i]['ID_Ami'] ?>" class="text-decoration-none"><i class="fas fa-user-minus"></i></a></td>
                              </tr><?php
                            }else{
                              ?><tr>
                                <td><?= $row[$i]['ID_Ami'] ?></td>
                                <td><a href="profil.php?user=<?= $row[$i]['Colectionneur_ami'] ?>" class="text-decoration-none"><?= $row[$i]['Colectionneur_ami'] ?></a></td>
                                <td><i class="fas fa-user-slash"></i></td>
                              </tr><?php
                          }
                        }else{
                            if ($row[$i]['état']){
                            $user_chek[]= $row[$i]['Colectionneur'];
                            ?><tr>
                              <td><?= $row[$i]['ID_Ami'] ?></td>
                              <td><a href="profil.php?user=<?= $row[$i]['Colectionneur'] ?>" class="text-decoration-none"><?= $row[$i]['Colectionneur'] ?></a></td>
                              <td><a href="amisP.php?action=delete&id=<?= $row[$i]['ID_Ami'] ?>" class="text-decoration-none"><i class="fas fa-user-minus"></i></a></td>
                            </tr><?php
                            }
                          }
                        }
                       ?>

                  </tbody>
                </table>
                </div>
                <div class="" style="margin-left: 40px;">
                  <h1>Les invitations</h1>
                  <table class="content-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Utilisateurs</th>
                        <th>Accipter</th>
                        <th>Refuser</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        for ($i=0; $i < sizeof($row) ; $i++) {
                          if ($row[$i]['Colectionneur_ami'] == $login and $row[$i]['état']==false) {
                            $user_chek[]= $row[$i]['Colectionneur'];
                            ?><tr>
                              <td><?= $row[$i]['ID_Ami'] ?></td>
                              <td><a href="profil.php?user=<?= $row[$i]['Colectionneur'] ?>"class="text-decoration-none"><?= $row[$i]['Colectionneur'] ?></a></td>
                              <td class="Accipte"><a  href="amisP.php?action=accipte&id=<?= $row[$i]['ID_Ami'] ?>" class="text-decoration-none"><i class="fas fa-plus"></i></a></td>
                              <td><a href="amisP.php?action=delete&id=<?= $row[$i]['ID_Ami'] ?>" class="text-decoration-none"><i class="fas fa-minus"></i></a></td>
                            </tr><?php
                          }
                        }
                       ?>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="" style="margin-left: 25%;">
                <h1>Ajouter Users</h1>
                <?php
                  $query = $db->query("SELECT * FROM users");
                  $rows = $query->fetchAll();
                 ?>
                 <table class="content-table">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>Utilisateurs</th>
                       <th>Mail</th>
                       <th>Tlp</th>
                       <th>Ajouter</th>
                       <?php if (isset($_SESSION['admin'])): ?>
                         <th>Supprimer <i class="fas fa-star"></i></th>
                       <?php endif; ?>

                     </tr>
                   </thead>
                   <tbody>
                     <?php foreach ($rows as $row): ?>
                       <?php if (!in_array($row['login'],$user_chek)): ?>
                         <tr>
                           <td><?= $row['ID'] ?></td>
                           <td><a href="profil.php?user=<?= $row['login'] ?>"class="text-decoration-none"><?= $row['login'] ?></a></td>
                           <td><?= $row['email'] ?></td>
                           <td><?= $row['phonenumber'] ?></td>
                           <td><a href="amisP.php?action=add&login=<?= $row['login'] ?>" class="text-decoration-none"><i class="fas fa-user-plus"></i></a></td>
                           <?php if (isset($_SESSION['admin'])): ?>
                             <td><a href="amisP.php?action=delete_user&user_id=<?= $row['ID'] ?>" class="float-center"style="color: #e85a4f;"><i class="fas fa-trash"></i></a></td>
                           <?php endif; ?>
                         </tr>
                       <?php endif; ?>
                     <?php endforeach; ?>
                 </tbody>
               </table>
              </div>

          </div>
        </div>
      </div>
      <?php require "include/footer.php" ?>
      <script>
        $(document).ready(function(){
          $('table').hover(
            function(){$(this).animate({marginTop: "-=1%",opacity: "100%"},200);},
            function(){$(this).animate({marginTop: "0%",opacity: "80%"},200);}
          );
        });
      </script>
</body>
</html>
