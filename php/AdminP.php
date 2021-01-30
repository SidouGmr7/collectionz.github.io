<?php
    session_start();
    require_once ('config.php');
    $id=$_SESSION['id'];
    $query = "INSERT INTO admin(ID_user, état)VALUES(?,?)";
    $insert = $db->prepare($query);
    $result = $insert->execute([$id ,"false"]);
    $_SESSION['adminajouter']=1;
    header('location: ../nous-contactez.php');
 ?>
