<?php

    /***
    strftime() - get's the time based on what format your placed.
    %X - current system time.
    %B - current system month.
    %d - current system day.
    %Y - current system year.
    ***/
    
    session_start();
    if($_SESSION["user"]) {
    } else {
        header("location:index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $details = mysql_real_escape_string($_POST["details"]);
        $time = strftime("%X");
        $date = strftime("%B %d, %Y");

        $decision = "no";

        mysql_connect("localhost", "root", "root") or die(mysql_error());
        mysql_select_db("php_crud_auth") or die("Cannot select the database");

        foreach($_POST['public'] as $each_check) {
            if($each_check != null) {
                $decision = "yes";
            }
        }

        mysql_query("INSERT INTO list(details, date_posted, time_posted, public) VALUES('$details', '$date', '$time', '$decision')");
        header("location: user_home.php");
    } else {
        header("location: user_home.php");
    }

?>