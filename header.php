<!-- Dit zal op elke pagina zijn als de header -->

<?php include ('server.php')?>
<?php
   
//logout functie
   
 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['gebruikersnaam']);
  	header("location: homepage.php");
  }
?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Port of Troy</title>
    <meta name="author" content="Your Name">
    <meta name="description" content="Example description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/portoftroy.css">
    <link rel="icon" type="image/x-icon" href="" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css?family=Bitter|Cinzel|Noto+Sans+KR|Shadows+Into+Light|Trade+Winds|Nosifer|Tangerine|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.12.1/css/all.css">

</head>

<body>

    <div class='sectie_main'>
        <div class="img-container">
            <div class="upper-header">
                <div class="logo">
                    <img src="../IMG/logo3.png">
                </div>
                <?php 
                
               //navbar 
            //De eerste navbar is voor als de gebruiker is ingelogd, de tweede voor als de gebruiker dat niet is
                
               if(isset($_SESSION['gebruikersnaam'])){
                   echo "<div class='navbar'>
               <ul>
                   <li><a href='homepage.php'><i class='fas fa-home '></i></a></li>
                   <li><a>Zoek & Boek</a></li>
                    <li><a href='boekingspagina.php'>Boeken</a></li>
                     <li class='navbargebruikersnaam'>" . 

     $_SESSION['gebruikersnaam'] .  "</li>
     
                   <li><a href='registratiepagina.php?logout='1' ' style='color: red;'>Uitloggen</a>
                   </li>
                   
               </ul>
               
               </div>
               </div>
               
           <div class='contacticoons'>
           
               <ul><li>
                   <i class='fab fa-instagram fa-3x'></i></li>
           <li>
               <i class='fab fa-facebook fa-3x'></i></li>
           <li>
                   <i class='fab fa-twitter fa-3x'></i></li>
                  
             
               </ul>
   </div>
               ";}
                //eind eerste navbar
                
                else{
                
            echo "<div class='navbar'>
                <ul>
                    <li><a href='homepage.php'><i class='fas fa-home '></i></a></li>
                    <li><a>Zoek & Boek</a></li>
                     <li><a href='registratiepagina.php'>Registreren</a></li>
                    <li><a href='#' id='knop'><i class='far fa-user'></i></a></li>
                      
                </ul>
                </div>
                </div>
            <div class='contacticoons'>
                <ul><li>
                    <i class='fab fa-instagram fa-3x'></i></li>
            <li>
                <i class='fab fa-facebook fa-3x'></i></li>
            <li>
                    <i class='fab fa-twitter fa-3x'></i></li>
                    
                    
              
                </ul>
    </div>
           "; }
                //eind tweede navbar
                ?>

                <div class="inner-container">
                    <h1> Naar uw volgende bestemming!</h1>
                    <a class="btn" href="bungalows.php">KLIK HIER</a>
                </div>
                <div class="golf">
                </div>
            </div>
        </div>


        <!-- De javascript pop up-->
        <div class="popuplogin">
            <div class="popuplogincontent">
                <div id="popupuser">
                    <i class="far fa-user"></i></div>
                <form method="POST" action="homepage.php">


                    <input type="text" placeholder="Gebruikersnaam" name="gebruikersnaam">
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord_1">
                    <button type="submit" class="tweedeknop" name="login_user">Login</button>
                    <a href="registratiepagina.php">Nog geen account? Registreer hier!</a>



                </form>
            </div>


            <a href="#" class="popupsluit">
                <i class="fas fa-times-circle"></i>
            </a>

            <!--Eind javascript pop up -->

        </div>


        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
        </div>
        <h3>
            <?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
            <?php endif ?>
        </h3>
