<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    footer{
        height:40vh;
        display: flex;
        justify-content: center;
        background-color: #343A40;
        color: white;

    }
    .global{
        width: 80%;
        height: 100%;
        display: flex;
        justify-content: space-between;
    }
    .gauche{
        display: flex;
        width: 40%;
        color: white;
        margin-left: 150px;


    }
    .information{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .information h3{
        color: #e85a4f;
    }
    .information p{
        margin-top: 15px;
        font-size: 14px;
    }
    .links2{
        display: flex;
        flex-direction: column;
        justify-content:center;

    }
    .links2 a{
        margin-top: 5px;
        text-decoration: none;
        color: #e85a4f;
        margin-left: 50px;
    }
    .contact{
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .contact h4{
        margin-bottom: 5px;
    }
    .contact p{
        font-size: 14px;
        margin-top: 15px;
    }
    .droite{
        display: flex;
        width: 50%;
        color: white;
        justify-content: center;
    }
    .sing{
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin-left: 25px;
    }
    .sing input{
        margin-top: 20px;

    }
    .submit{
        margin-left: 30px;
        margin-right: 30px;
        padding-bottom: 10px;
        padding-top: 10px;
        border-radius: 5px;
        background-color:#e85a4f ;
        border: none;
        color: white;

    }

    </style>
  </head>
  <body>
    <footer>
         <div class="global">
           <div class="gauche">
              <div class="information">
              <h3><i class="fas fa-coffee"></i>&nbsp; CollectionZ</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit nihil, facilis blanditiis doloribus delectus dignissimos at voluptates excepturi consectetur repellendus, sed debitis. Asperiores, porro quia sequi necessitatibus vero harum accusantium.</p>
              </div>
             <div class="links2">
                 <a href="#">à propos</a>
                 <a href="#">Carrières</a>
                 <a href="#">Équipe</a>
                 <a href="#">Propriétaire</a>
                 <a href="#">Blog</a>
                 <a href="#">Plus</a>
             </div>
        </div>
        <div class="droite">
        <div class="sing">
         <h4>Inscrivez-vous aux    <br>mises à jour</h4> <br>
         <input type="email" name="email" value="Mail"><br>
         <input type="submit" value="S'inscrire" class="submit">
        </div>

        </div>

       </div>
    </footer>

  </body>
</html>
