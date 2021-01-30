<?php
  session_start();

  if(isset($_SESSION['login'])){
    header('Location: index.php');
  }


 ?>
<!DOCTYPE html>
<html  lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <style media="screen">
    body,html{
      margin: 0;
      padding: 0;
      height: 100%;
      /*background: url("../img/img3.jpg") no-repeat  center  center;*/
      background-size: cover;
    }
    .user_card{
      position: absolute;
      top: 100px;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      height: 400px;
      width: 350px;
      margin-top: auto;
      margin-bottom: auto;
      background: #f39c12;
      position: relative;
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 5px;
    }

    .brand_logo_container{
      position: absolute;
      height: 170px;
      width: 170px;
      top: -75px;
      border-radius: 50%;
      background: white;
      padding: 10px;
      text-align: center;
    }

    .brand_logo{
      height: 150px;
      width: 150px;
      border-radius: 50%;
      border: 2px solid white;
    }

    .form_container{
      margin-top: 100px;
    }

    .login_btn{
      width: 100%;
      background: #e85a4f !important;
      color: white !important;
    }

    .login_btn:focus{
      box-shadow: none !important;
      outline: 0px !important;
    }
    .login_container{
      padding: 0 2rem;
    }
    .input-group-text{
      background: #e85a4f !important;
      color: white !important;
      border: 0 !important;
      border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus{
      box-shadow: none !important;
      outline: 0px !important;
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
      background-color: #c0392b !important;
    }

    </style>
  </head>
  <body>
    <?php require "include/navbar.php" ?>
    <div class="container ">
      <div class="d-flex fustify-content-center h-100" style="padding-bottom: 170px;">
        <div class="user_card" >
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container" style="background-color: #f4f4f4;">
              <img src="img/logo.png" class="brand_logo" alt="Programming logo">
            </div>
          </div>
          <div class="d-flex justify-content-center form_container">
    				<form action="php/LoginP.php" method="POST">
    					<div class="input-group mb-3">
    						<div class="input-group-append">
    							<span class="input-group-text" ><i class="fas fa-user"></i></span>
    						</div>
    						<input type="text" name="login" id="login" placeholder="login" class="form-control input_user" required>
    					</div>
    					<div class="input-group mb-2">
    						<div class="input-group-append">
    							<span class="input-group-text"><i class="fas fa-key"></i></span>
    						</div>
    						<input type="password" name="password" id="password" placeholder="Mote de Passe" class="form-control input_pass" required>
    					</div>
    					<div class="form-group">
    						<div class="custom-control custom-checkbox">
    							<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
    							<label class="custom-control-label" for="customControlInline">Souviens-toi de moi</label>
    						</div>
    					</div>
              <div class="d-flex justify-content-center mt-3 login_container">
                <input type="submit" name="button" value="S'identifier" class="btn login_btn">
          		</div>
            </form>
          </div>

        	<div class="mt-4">
        		<div class="d-flex justify-content-center links">
              Vous n'avez pas de compte? <a href="Signup.php" class="ml-2">S'inscrire</a>
      			</div>
    				<div class="d-flex justify-content-center">
    					<a href="#">Mot de passe oublié?</a>
        		</div>
      		</div>
        </div>
      </div>
    </div>
    <?php require "include/footer.php" ?>
</html>
