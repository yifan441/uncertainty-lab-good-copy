#!/usr/local/bin/php
<?php 
   
    session_start();

    $db = new SQLite3('participants.db');


    $statement = 'SELECT firstname FROM participants WHERE lastname=\''.$_SESSION["UserData"]["username"].'\'';
    $results = $db->query($statement);
    $row = $results->fetchArray();
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $date = $row['cdate'];
    $followupversion = $row['followupversion'];
    $followup=$row['followup'];
    $affiliation = $row['affiliation']; 
    $statement = 'SELECT DISTINCT affiliation FROM participants';
    $list_results = $db->query($statement);

    $rows = $db->query("SELECT COUNT(*) as count FROM participants");
    $row = $rows->fetchArray();
    $numrows = $row['count'];
    $arrayforwinner = array();


    while($dorm_list = $list_results->fetchArray())
        {

            $rows = $db -> query('SELECT COUNT(*) as count FROM participants WHERE affiliation="'.$dorm_list['affiliation'].'"');
            $row = $rows->fetchArray();
            $arrayforwinner[] = $row['count'];

        }
    $statement = 'SELECT affiliation FROM participants GROUP BY affiliation HAVING COUNT(*)='.max($arrayforwinner);
    $results = $db->query($statement);
    $row = $results->fetchArray();
    $i = 1;
    while ($i<2){
    $winner = $row['affiliation'];
    $i+=1;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Precommitment LeaderBoard</title>
    </head>

    <body>
        <header>
            <h1>LeaderBoard</h1>
        </header>

        <main>
            <h3><?php echo $winner; ?> is winning!!</h3>
            <?php
            echo "<table style=\"border:1px solid black\">
            <tr>
            <th>Dorm</th>
            <th>Number Committed</th>
            </tr>";

            while($dorm_list = $list_results->fetchArray())
            {

            echo "<tr>";
            $rows = $db -> query('SELECT COUNT(*) as count FROM participants WHERE affiliation="'.$dorm_list['affiliation'].'"');
            $row = $rows->fetchArray();
            echo "<td>".$dorm_list['affiliation']."</td>";
            echo "<td>".$row['count']."</td></tr>";
        }
            echo "</table>";
            $db->close();
            ?>
        </main>
    </body>
</html>