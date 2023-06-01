#!/usr/local/bin/php
<?php

    session_start();

    if($_POST["submit_followthrough"]) {
       
        $submitted_firstname = isset($_POST["firstname"]) ? $_POST["firstname"]: "";
        $submitted_lastname = isset($_POST["lastname"]) ? $_POST["lastname"]: "";
        $submitted_email = isset($_POST["email"]) ? $_POST["email"]: "";
        $submitted_confirm_email = isset($_POST["confirm_email"]) ? $_POST["confirm_email"]: "";
        $followup = isset($_POST["radio"]) ? $_POST["radio"]: "";
        date_default_timezone_set('America/Los_Angeles');
        $date = date('m/d/Y');



        if(!$submitted_firstname) {
            $_SESSION["message"] = "Please enter your first name with a capitalized first letter.";
        }
 
        else if(!$submitted_lastname) {
            $_SESSION["message"] = "Please enter your last name with a capitalized first letter.";
        }

        else if(!$submitted_email) {
            $_SESSION["message"] = "Please enter your correct email.";
        }
       
        else if($submitted_email != $submitted_confirm_email) {
            $_SESSION["message"] = "Emails do not match, please reenter.";
        }
        else if(!filter_var($submitted_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["message"] = "Email is invalid, please reenter.";
        }
     
        else {
            $db = new SQLite3('participants.db');

            $statement = 'CREATE TABLE IF NOT EXISTS participants(firstname TEXT, lastname TEXT, email TEXT, affiliation TEXT, cdate TEXT, followupversion INTEGER, followup INTEGER)';
            $db->exec($statement); 
            $statement = 'SELECT lastname FROM participants WHERE email=\''.$submitted_email.'\''.' AND firstname=\''.$submitted_firstname.'\'';  

            //DO THE UCWORDS THING TO FIRST NAME AND WE'RE FINE, AND REDO THE DATABASE TO SHAVE OFF EXTRA WHITESPACE


            $results = $db->query($statement);
            $row = $results->fetchArray();
            if($row['lastname']) {

                $statement = 'UPDATE participants SET followup ='.intval($followup).' WHERE lastname =\''.$row['lastname'].'\'';
                $db->exec($statement);
                 $_SESSION["message"] = "Thank you for following through, we appreciate it!";
                header("Location: followthrough.php");
                exit;

            } else {
                $_SESSION["message"] = "We could not find your information, please make sure that all of your info is the same as when you signed up for the precommitment. Also, please make sure that you capitalize the first letter of your first and last name!";
            }
            $db->exec($statement);
            $db->close();
        }
           
    }

    header("Location: followthrough.php");
    exit;

?>