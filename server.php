<?php


//session_start();

      session_start();
   




$gebruikersnaam ="";
$email ="";
$errors= array();
$_SESSION['success'] = "";


//connectie db

$db = mysqli_connect('localhost', 'root', '', 'portoftroy') or die("could not connect to database");

//Als de gebruiker op het registratie knopje drukt

if(isset($_POST['registratie'])){
    $gebruikersnaam = mysqli_real_escape_string($db, $_POST["gebruikersnaam"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $wachtwoord1 = mysqli_real_escape_string($db, $_POST["wachtwoord_1"]);
    $wachtwoord2 = mysqli_real_escape_string($db, $_POST["wachtwoord_2"]);
    
    if(empty($gebruikersnaam)){array_push($errors, "Gebruikersnaam moet ingevuld worden");}
    if (empty($email)) { array_push($errors, "Email moet ingevuld worden"); }
     if (empty($wachtwoord1)) { array_push($errors, "Wachtwoord moet ingevuld worden!"); }
  if ($wachtwoord1 != $wachtwoord2) {array_push($errors, "De ingevulde wachtwoorden komen niet overeen!");}
}

//Check als er geen bestaande gebruikers zijn
$user_check_query = "SELECT * FROM gebruiker WHERE gebruikersnaam='$gebruikersnaam' OR email='$email' LIMIT 1";
  $resultaat = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resultaat);
  
  if ($user) { // als gebruiker bestaat
    if ($user['gebruikersnaam'] === $gebruikersnaam) {
      array_push($errors, "Gebruikersnaam bestaat al");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email bestaat al");
    }
  }


if (count($errors) == 0) {
  	$wachtwoord = md5($wachtwoord1);//beveiligd het wachtwoord voordat het in de database gestopt wordt

  	$query = "INSERT INTO gebruiker (gebruikersnaam, email, wachtwoord) 
  			  VALUES('$gebruikersnaam', '$email', '$wachtwoord')";
  	mysqli_query($db, $query);
  	$_SESSION['gebruikersnaam'] = $gebruikersnaam;
  	$_SESSION['success'] = "U bent nu ingelogd";
  	header('location: homepage.php');
  }


// Gebruiker log in
if (isset($_POST['login_user'])) {
  $gebruikersnaam = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
  $wachtwoordlogin = mysqli_real_escape_string($db, $_POST['wachtwoord_1']);

  echo "user geklikt";
  if (empty($gebruikersnaam)) {
  	array_push($errors, "Gebruikersnaam moet ingevuld worden");
  }
  if (empty($wachtwoordlogin)) {
  	array_push($errors, "Wachtwoord moet ingevuld worden");
  }


    //Checkt op errors
  if (count($errors) ) {
  	$wachtwoordlogin = md5($wachtwoordlogin);
  	$query2 = "SELECT * FROM gebruiker WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoordlogin'";
      echo $query2;
      
  	$resultaat = mysqli_query($db, $query2);
      
  	if (mysqli_num_rows($resultaat) == 1) {
     $ingelogdgebruiker = mysqli_fetch_assoc($resultaat);
        if($ingelogdgebruiker['gebruikertype'] === 'admin'){
             $gebruikerquerytype ="SELECT gebruikertype FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
            echo $ingelogdgebruiker['gebruikertype'];
            $gebruikertype = mysqli_fetch_array($db, $gebruikerquerytype);
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            echo $gebruikertype;
             $gebruikerquerytype ="SELECT gebruikertype FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
            $_SESSION['gebruikertype']= $gebruikertype;
         
  	  $_SESSION['success'] = "You are now logged in";
      
     
  	  header('location: personeelspagina.php');
        }
        else{
  	  $_SESSION['gebruikersnaam'] = $gebruikersnaam;
  	  $_SESSION['success'] = "You are now logged in";
            $_SESSION['gebruikertype']= $gebruikertype;
             header('location: homepage.php');
        }
     
  	 
  	}else {
  		array_push($errors, "Verkeerde gebruikersnaam of wachtwoord!");
  	}
  }
}




//Functie om te checken of gebruiker een admin is of niet
function admincheck()
{
	if (isset($_SESSION['gebruikersnaam']) && $_SESSION['gebruikersnaam']['gebruikertype'] === 'admin' ) {
		return true;
	}else{
		return false;
	}
}
function checkadmin(){
    global $gebruikertype;
    if ($gebruikertype=="NULL"){
        header('location: homepage.php');
    }
}
//Reservatie pagina
if(isset($_POST['boekingsknop'])){
$Titelklant = mysqli_real_escape_string($db, $_POST["Titelklant"]);
    $Voornaam = mysqli_real_escape_string($db, $_POST["voornaam"]);
    $Achternaam = mysqli_real_escape_string($db, $_POST["achternaam"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $nationaliteit = mysqli_real_escape_string($db, $_POST["nationaliteit"]);
    $land = mysqli_real_escape_string($db, $_POST["land"]);
    $telefoonnummer = mysqli_real_escape_string($db, $_POST["telefoonnummer"]);
    $park = mysqli_real_escape_string($db, $_POST["park"]);
    $kamertype = mysqli_real_escape_string($db, $_POST["kamertype"]);
    $aantalvolwassenen = mysqli_real_escape_string($db, $_POST["aantalvolwassenen"]);
    $aantalkinderen = mysqli_real_escape_string($db, $_POST["aantalkinderen"]);
    $persoonlijkebutler = mysqli_real_escape_string($db, $_POST["persoonlijkebutler"]);
    $checkindatum = mysqli_real_escape_string($db, $_POST["checkindatum"]);
    $checkuitdatum = mysqli_real_escape_string($db, $_POST["checkuitdatum"]);
    
    $query3 = "INSERT INTO reservatie (Titel, Voornaam, Achternaam, Email, Nationaliteit, Paspoort_land, Telefoonnummer, Park, Type_kamer, Aantal_volwassenen, Aantal_kinderen, Persoonlijke_butler, Check_in_datum, Check_uit_datum) VALUES('$Titelklant', '$Voornaam', '$Achternaam', '$email', '$nationaliteit', '$land', '$telefoonnummer','$park', '$kamertype', '$aantalvolwassenen', '$aantalkinderen', '$persoonlijkebutler', '$checkindatum', '$checkuitdatum')";
    //mysqli_close($db);   
   reservatieCheck($checkindatum, $checkuitdatum, $kamertype);
    $resultaat2 = mysqli_query($db, $query3);
    

}

//Zoekfunctie

if(isset($_POST['zoekFunctie'])){
    
}
else{
    $queryfilter= "SELECT *  FROM 'reservatie' ";
    $zoek_resultaat = filterTabel($queryfilter);
}
function filterTabel ($queryfilter){
    $db = mysqli_connect('localhost', 'root', '', 'portoftroy') or die("could not connect to database");
    $filter_resultaat = mysqli_query($db, $queryfilter);
    return $filter_resultaat;
}


//Reservatie check

function reservatieCheck($checkindatum, $checkuitdatum, $kamertype){
   // global $db;
    
    $gebruikersnaam ="";
$email ="";
$errors= array();
$_SESSION['success'] = "";


//connectie database
//Aan dit gedeelte ben ik nog aan het werken, maar dit checkt of de reservatie van de gebruiker mogelijk is of niet
$db2 = new mysqli('localhost', 'root', '', 'portoftroy');
    $sqlreservatie="select * from reservatie WHERE Check_in_datum='$checkindatum' AND Check_uit_datum='$checkuitdatum' AND Type_kamer='$kamertype'";
    echo $sqlreservatie; 
    $reservatiequery = $db2->query($sqlreservatie);

     if ($reservatiequery->rowCount()) {
      //Er is een reservatie
         $db2->close();
        return true;
         "Kan niet reserveren";
    } else {
       //Geen reservaie
         $db2->close()
;        return false;
         echo "Uw reservatie is ingevoerd";
    }
   // $db2->close();
}
?>
