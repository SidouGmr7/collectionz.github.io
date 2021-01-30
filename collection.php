<?php
  session_start();
  require_once('php/config.php');
  $query= "SELECT * FROM catégorie";
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Collection Z</title>
    <style media="screen">
      body{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          background-color: ;
      }
      .search{
          position: relative;
          top: 20vh;
          width: 50%;
          text-align: center;
          margin-top: -100px;
      }
      .intro{
          font-size: 20px;
          color: #EF4F42;
      }
      .recherche{
          margin-top: 30px;
          width: 60%;
          border: 3px solid  #E85A4F;
          border-radius: 50px;
          height: 60px;
          text-align: center;
          font-size: 16px;
      }
      .cards{
          margin-top: 150px;
          display: grid;
          grid-template-columns: repeat(4,1fr);
          gap: 20px;
          justify-content: center;
          padding-left: 20px;
          margin-bottom: 20px;
      }
    .text-decoration-none{
      color: white;
      transition: 0.5s;
      text-align: center;
      text-decoration: none;
      background-color: #e85a4f;
    }


    </style>
  </head>
  <body>
    <?php require "include/navbar.php" ?>
    <form action="listitems.php" method="GET" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
      <div class="search">
          <p class="intro">Decouvrez une multitude de collections !</p>
          <i class="fas fa-search" aria-hidden="true"></i>
          <input name="box" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Rechercher un article..." aria-label="Search">
      </div>
    </form>
      <div class="cards">
      <?php foreach ($rows as $row): ?>
        <div class="col-md-3">
          <div class="card shadow-lg" style="width: 18rem;">
            <a class="text-decoration-none" href="listitems.php?action=cat&name=<?= $row['Name'] ?>" >
              <img class="card-img-top" src="<?= 'data:image;base64,'.base64_encode($row['Images']).'' ?>"  >
              <div class="text-decoration-none"><?= $row['Name'] ?></div>
            </a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
    <?php require "include/footer.php" ?>
    <?php require "include/alert.php" ?>
    <script>
      $(document).ready(function(){
        $('.col-md-3').hover(
          function(){$(this).animate({marginTop: "-=3%",opacity : "80%"},200);},
          function(){$(this).animate({marginTop: "0%",opacity : "100%"},200);}
        );
        $('.search').hover(
          function(){$(this).animate({width: "100%"},200);},
          function(){$(this).animate({width: "50%"},200);}
        );
      });
    </script>
  </body>
</html>
