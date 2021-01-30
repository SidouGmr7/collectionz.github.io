<?php
  require_once ('config.php');
 ?>
<?php
    $login=$_POST['login'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $password=$_POST['password'];
    $query2 = "INSERT INTO users(login, firstname , lastname , email ,phonenumber, password) VALUES(?,?,?,?,?,?)";
    $insert = $db->prepare($query2);
    $result = $insert->execute([$login ,$firstname, $lastname, $email, $phonenumber, $password]);
    if($result){
      echo "Successfuly saved in data base";
    }
