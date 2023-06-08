#!/usr/local/bin/php
<?php
  
    session_start();

    function phpalert($string) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"$string\")";
        echo "</script>";
    }

   
    if($_SESSION["message"]) {
        phpalert($_SESSION["message"]);
        $_SESSION["message"] = "";
    }
?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up (Static)</title>
  </head>

  <body>

    <header id="header">
      <h1 id="signup" style="text-align:center">Sign Up</h1>
    </header>

    <main>
      <section id="section">
          <form method="POST" action="signupstatic.php" style="text-align:center">
            <label for="firstname">First name:</label>
            <input value="" id="firstname" name="firstname">
            <br>
            <label for="lastname">Last name:</label>
            <input value="" id="lastname" name="lastname">
            <br>
            <label for="email" class="email">Email:</label>
            <input value="" id="email" name="email" class="email">
            <br>
            <label for="confirmemail" class="c">Confirm Email:</label>
            <input value="" class="c" id="confirm_email" name="confirm_email">
            <br>
            <label for="affiliation" class="c">Dorm Affiliation:</label>
            <select name="affiliation" id="affiliation" class="c">
            <option value="Canyon Point & Courtside">Canyon Point & Courtside</option>
            <option value="Centennial Hall">Centennial Hall</option>
            <option value="Delta Terrace">Delta Terrace</option>
            <option value="De Neve East">De Neve East</option>
            <option value="De Neve West">De Neve West</option>
            <option value="De Neve Towers">De Neve Towers</option>
            <option value="Dykstra Hall">Dykstra Hall</option>
            <option value="Hedrick Hall">Hedrick Hall</option>
            <option value="Hedrick Summit">Hedrick Summit</option>
            <option value="Hitch Suites">Hitch Suites</option>
            <option value="Olympic Hall">Olympic Hall</option>
            <option value="Rieber Hall">Rieber Hall</option>
            <option value="Rieber Terrace">Rieber Terrace</option>
            <option value="Rieber Vista">Rieber Vista</option>
            <option value="Saxon Suites">Saxon Suites</option>
            <option value="Sproul Cove/Landing">Sproul Cove/Landing</option>
            <option value="Sproul Hall">Sproul Hall</option>
            <option value="Westwood Hills">Westwood Hills</option>
            <option value="Gayley Heights">Gayley Heights</option>
            <option value="Southwest">Southwest</option>
            <option value="Weyburn/Hilgard">Weyburn/Hilgard</option>
            <option value="Sawtelle">Sawtelle</option>
            <option value="Sepulveda">Sepulveda</option>
            <option value="Keystone/Mentone">Keystone/Mentone</option>
            <option value="Venice/Barry">Venice/Barry</option>
            <option value="Rose Ave/Clarington">Rose Ave/Clarington</option>
            </select>
            <br>
            <input type="checkbox" id="tandc" name="tandc">
            <label for="tandc" id="terms">I accept the <a href="termsandconditions.html" target="_blank">Terms and Conditions</a>.</label>
            <br>
            <input type="submit" id="signupbutton" name="submit_signup" value="Sign Up!">
          </form>
      </section>
    </main>

  </body>
</html>
