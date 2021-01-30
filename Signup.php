<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SING UP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <style media="screen">
      html,body{
        /*background: url("img/img3.jpg") no-repeat  center  center;*/

      }
      .md-form{
        display: flex;
        margin: 10px;
      }

      h3{
        color: #e85a4f;
      }
      .input-group-text i{
        color: white;
      }
      .input-group-text{
        background-color: #e85a4f;
      }
      .col-md-10{
        margin-left: 170px;
      }
      .submit{
        text-decoration: none;
        font-size: 20px;
        background-color: #e85a4f ;
        color: white;
        border-radius: 5px;
      }
      .input-group-prepend .input-group-text{
        background-color: #e85a4f;
      }

    </style>
  </head>
  <body>
    <?php require "include/navbar.php" ?>
  <div class="mask rgba-gradient align-items-center">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-10 col-xl-5 mb-4">
            <form  action="registration.php" method="post" class="col-md-10 mt-5">
              <div class="card wow fadeInRight" data-wow-delay="0.3s">
                <div class="card-body">
                  <!--Header-->
                  <div class="text-center">
                    <h3 class="white-text">
                      <i class="fas fa-user white-text"></i> S'inscrire :</h3>
                    <hr class="hr-light">
                  </div>
                  <!--Body-->
                  <div class="form-group">
                    <div class="col-md-13 input-group m-2">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-users"></i></div>
                       </div>
                       <input type="text" name="login" id="login" class="white-text form-control" placeholder="login">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-13 input-group m-2">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-user"></i></div>
                       </div>
                       <input type="text" id="firstname" name="firstname" class="white-text form-control" placeholder="Nome">
                       <input type="text" id="lastname" name="lastname" class="white-text form-control" placeholder="Prénome">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-13 input-group m-2">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-phone"></i></div>
                       </div>
                       <input type="text" id="phonenumber" name="phonenumber" class="white-text form-control" placeholder="Numéro de téléphone">
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-13 input-group m-2">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                       </div>
                       <input type="email" id="email"  name="email" class="white-text form-control" placeholder="Adresse mail">
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-13 input-group m-2">
                      <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-lock"></i></div>
                       </div>
                       <input type="password" name="password" id="password" class="white-text form-control" placeholder="Mote de Passe">
                     </div>
                  </div>

                  <div class="text-center mt-4">
                    <input type="submit" name="register" id="register" value="S'inscrire" class="btn submit">
                    <hr class="hr-light mb-3 mt-4">
                    <div class="inline-ul text-center">
                      <a class="p-2 m-2 tw-ic">
                        <i class="fab fa-twitter white-text"></i>
                      </a>
                      <a class="p-2 m-2 li-ic">
                        <i class="fab fa-linkedin-in white-text"> </i>
                      </a>
                      <a class="p-2 m-2 ins-ic">
                        <i class="fab fa-instagram white-text"> </i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
    <?php require "include/footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
      $(function () {
        $('#register').click(function (e) {
          var valid = this.form.checkValidity();
          if(valid){
            var login 	= $('#login').val();
            var firstname 	= $('#firstname').val();
            var lastname	= $('#lastname').val();
            var email 		= $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var password 	= $('#password').val();

            e.preventDefault();
            $.ajax({
              type: 'POST',
    					url: 'php/SignupP.php',
    					data: {login: login,firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
    					success: function(data){
    					  Swal.fire({
    								'title': 'Successful',
    								'text': data,
    						    'icon': 'success',
    								})
                },

          		error: function(data){
      					Swal.fire({
    								'title': 'Errors',
        						'text': 'Server is not Work',
                    'icon': 'error',
    								})
    					}
            })
          }
        })
      })
    </script>
  </body>
</html>
