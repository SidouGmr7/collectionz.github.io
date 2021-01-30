<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <style media="screen">
    .swal-button {
      border-radius: 10px;
      background-color: #E85A4F;
      font-size: 14px;
      border: 1px solid #E85A4F;
    }
    </style>
  </head>
  <body>
    <?php if(isset($_SESSION['Deletecol'])){?>
      <script type="text/javascript">
        swal({
          text: "Vous avez supprimer une collection",
          icon: "success",
        });
      </script>
      <?php unset($_SESSION['Deletecol']); ?>
    <?php } ?>
    <?php if(isset($_SESSION['addcol'])){?>
      <script type="text/javascript">
        swal({
          text: "Vous avez Ajouter une collection",
          icon: "success",
        });
      </script>
      <?php unset($_SESSION['addcol']); ?>
    <?php } ?>
    <?php if(isset($_SESSION['additem'])){?>
      <script type="text/javascript">
        swal({
          text: "Vous aver Ajouter une Item",
          icon: "success",
        });
      </script>
      <?php unset($_SESSION['additem']); ?>
    <?php } ?>
    <div class="envoyermes">
      <?php if(isset($_SESSION['message'])){?>
        <script type="text/javascript">
          swal({
            text: "Vous avez Envoyer une Message",
            icon: "success",
          });
        </script>
        <?php unset($_SESSION['message']); ?>
      <?php } ?>
      <?php if(isset($_SESSION['messageerr'])){?>
        <script type="text/javascript">
          swal({
            text: "Utilisateur introuvable",
            icon: "error",
          });
        </script>
        <?php unset($_SESSION['messageerr']); ?>
      <?php } ?>
      <?php if(isset($_SESSION['vousmeme'])){?>
        <script type="text/javascript">
          swal({
            text: "Vous ne pouvez pas envoyer un message a vous meme",
            icon: "warning",
          });
        </script>
        <?php unset($_SESSION['vousmeme']); ?>
      <?php } ?>
    </div>
    <?php if(isset($_SESSION['Deletemes'])){?>
      <script type="text/javascript">
        swal({
          text: "Vous avez supprimer une message",
          icon: "success",
        });
      </script>
      <?php unset($_SESSION['Deletemes']); ?>
    <?php } ?>
    <?php if(isset($_SESSION['adminajouter'])){?>
      <script type="text/javascript">
        swal({
          text: "Attendez d'être bientôt accepté par un administrateur",
          icon: "success",
        });
      </script>
      <?php unset($_SESSION['adminajouter']); ?>
    <?php } ?>
    <?php if(isset($_SESSION['catégorievide'])){?>
      <script type="text/javascript">
        swal({
          text: "cette catégorie est vide !!",
          icon: "warning",
        });
      </script>
      <?php unset($_SESSION['catégorievide']); ?>
    <?php } ?>
    <?php if(isset($_SESSION['recharchevide'])){?>
      <script type="text/javascript">
        swal({
          text: "il n'ya pas cette item !! ",
          icon: "warning",
        });
      </script>
      <?php unset($_SESSION['recharchevide']); ?>
    <?php } ?>
  </body>
</html>
