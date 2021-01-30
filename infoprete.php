<?php session_start();
require_once 'php/config.php';
$id=$_SESSION['id'];
$query = "SELECT * FROM itemprete WHERE ID_Colecionneur_Prete= '$id'";
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
      .container-fluid{
        margin-left: 300px;
      }
    </style>
</head>
<body>
      <?php require "include/navbar.php" ?>
       <div class="d-flex" id="wrapper">
         <?php require "include/sidebar.php" ?>
         <div id="page-content-wrapper">
          <div class="container-fluid">
              <h1>Liste de mes pretes</h1>
              <table class="content-table">
                <thead>
                  <tr>
                    <th>ID Items</th>
                    <th>Users</th>
                    <th>Date de Prete</th>
                    <th>Date de retour</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($rows as $row): ?>
                    <?php
                      $id_owner= $row['ID_Colectionneur'];
                      $query = "SELECT login FROM users WHERE ID='$id_owner'";
                      $result = $db->prepare($query);
                      $result->execute();
                      $rows2 = $result->fetchAll();
                     ?>
                    <tr>
                      <td><a href="afficheitemprete.php?id_item=<?= $row['ID_Item'] ?>" class="text-decoration-none"><?= $row['ID_Item'] ?></a></td>
                      <td><a href="profil.php?user=<?= $rows2[0]['login'] ?>" class="text-decoration-none"><?= $rows2[0]['login'] ?></a></td>
                      <td><?= $row['Date_Prete'] ?></td>
                      <td><?= $row['Date_Retour'] ?></td>
                      <td><a href="php/AjouteCategorie.php?action=Retourner&original=<?php $id_owner ?>&id_item=<?= $row['ID_Item'] ?>"><i class="fas fa-undo-alt" style="color: #E85A4F;"></i></a></td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php require "include/footer.php" ?>
</body>
</html>
