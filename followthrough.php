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
    <title>Follow Up</title>
  </head>

  <body>

    <header id="header">
      <h1 id="follow through" style="text-align:center">Follow Through</h1>
    </header>

    <main>
      <section id="section">
        <h4 style="text-align:center">Please enter your information into this form (same info from making your precommitment) with the first letter CAPITALIZED for BOTH your first and last name.</h4>
          <form method="POST" action="changecheckmark.php" style="text-align:center">
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
            <p>Did you follow through with your precommitment? Be honest! ;)</p>
            <label for="yes">Yes </label>
              <input type="radio" checked="checked" name="radio" value="1" id="yes">
            <label for="no">   No </label>
            <input type="radio" name="radio" value="0" id="no">
            <br>
            <br>
            <input type="submit" id="submit" name="submit_followthrough" value="Submit">
          </form>
      </section>
    </main>

  </body>
</html>