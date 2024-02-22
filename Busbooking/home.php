<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-Transit Bus and Ticket Booking</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/footer.css">
  <!--  <link rel="stylesheet" type="text/css" href="cssfile/container.css">-->
   <link rel="stylesheet" type="text/css" href="cssfile/videoedit.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style type="text/css">

      body{


           background-image: url(image/city2.jpg);
           background-size: cover;
          background-repeat: no-repeat;
          background-attachment: fixed;





      /*
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                background-color: black;
            }
              #container{

                height: 100vh;
                width: 100%;
                background-image: url(image/3.jpg);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                transition: 2s;
                font-family: cursive;
                animation-name: animate;
                animation-direction: alternate-reverse;
                animation-duration: 40s;
                animation-fill-mode: forwards;
                animation-iteration-count: infinite;
                animation-play-state: running;
                animation-timing-function: ease-in-out;


            }

            @keyframes animate{

                0%{
                    background-image: url(image/1.jpg);
                }
                10%{
                    background-image: url(image/2.jpg);
                }
                20%{
                    background-image: url(image/3.jpg);
                }
                30%{
                    background-image: url(image/4.jpg);
                }
                40%{
                    background-image: url(image/5.jpg);
                }
                50%{
                    background-image: url(image/6.jpg);
                }
                60%{
                    background-image: url(image/7.jpg);
                }
                70%{
                    background-image: url(image/8.jpg);
                }
                80%{
                    background-image: url(image/9.jpg);
                }
                90%{
                    background-image: url(image/10.jpg);
                }
                100%{
                    background-image: url(image/1.jpg);
                }

*/
            }
.home_details{
      color: #fff;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-size: 92px;
      padding: 162px 5px 5px 185px;
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: black;

}
.font{

      color: #F9522E;
      font-family: Georgia, 'Times New Roman', Times, serif;
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: black
}

.button {
  font-size:50px;
      display: inline-block;
      background: maroon;
      color: white;
      size: 10px 30px;
      font-family: Arial, Helvetica, sans-serif;
      text-transform: uppercase;
      padding: 10px 15px;
      border-radius: 5px;
      box-shadow: 0px 17px 10px -10px rgba(0, 0, 0, 0.4);
      cursor: pointer;
      -webkit-transition: all ease-in-out 300ms;
      transition: all ease-in-out 300ms;
    }

.button:hover {
      box-shadow: 0px 37px 20px -20px rgba(0, 0, 0, 0.2);
      -webkit-transform: translate(0px, -10px) scale(1.2);
      transform: translate(0px, -10px) scale(1.2);
    }
      
    </style>

  </head>
  <body>



  <div id="container">


              <!--this is the header callling(nav bar)-->

            <?php include("nav.php");
             ?>



             


                  <h1 class="home_details">Your Bus Pass.Anytime. <br><font class="font">Anywhere..</font>

                  <br>


                  <a href="signUp.php">
                     <div class="button">Signup >></div>
                  </a>


                  </h1>










  </div>

 <!--<div class="section">

                      <video autoplay loop muted class="section">
                        
                                  <source src="video/video.mp4" type="video/mp4">

                      </video>


</div>-->
<!--section-->

            
 

            <!--this is the footer calling-->
            <?php include("footer.php");
             ?>



  </body>
</html>
