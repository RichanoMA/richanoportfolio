
<?php include 'header.php'?>

<div class="registratiebox">
    
    <div class="registratiefoto"></div>
    <div class="registratieformulier">
        
<h2>Registratie</h2>

<table>
  <form action="registratiepagina.php" method="POST">

    
      <tr>
        
          <td>
      <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" >
          </td>
      </tr>
      <tr>
          
          <td><input type="email" name="email" placeholder="Email" required></td>
      </tr>
      <tr>
          
          <td><input type="password" name="wachtwoord_1" placeholder="Wachtwoord"required></td>
      </tr>
      <tr>
          
          <td><input type="password" name="wachtwoord_2" placeholder="Wachtwoord bevestiging" required></td>
      </tr>
      
<tr><td><button type="submit" name="registratie">Verstuur</button></td></tr>

      <tr><td> <p>Al  een gebruiker?<a href="login">Log in</a></p></td></tr>
</form>    
</table>
    </div>
</div>

<?php include 'footer.php'?>