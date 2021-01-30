
<?php
  session_start();

  require_once ('config.php');

    $login = $_POST['login'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM users where login = '$login'";
    $result = $db->prepare($query);
    $result->execute();
    if($result->rowCount() > 0){
      $row = $result->fetchAll();
      if ($row[0]["password"] == $pass){
          $_SESSION['login'] = $row[0]['login'];
          $_SESSION['id'] = $row[0]['ID'];
          $_SESSION['email'] = $row[0]['email'];
          $_SESSION['first'] = $row[0]['firstname'];
          $_SESSION['last'] = $row[0]['lastname'];
          $_SESSION['tlp'] = $row[0]['phonenumber'];
          $_SESSION['pass'] = $row[0]['password'];
          $id= $_SESSION['id'];
          $query2 = "SELECT état FROM admin where ID_user = '$id' and état = '1'";
          $result2= $db->prepare($query2);
          $result2->execute();
          $rows = $result2->fetchAll();
          if($rows){ $_SESSION['admin'] = 1; }
          header('Location: ../index.php');
          exit0;
      }else{ header('Location:../login.php'); }
    }else { header('Location:../login.php'); }


?>
