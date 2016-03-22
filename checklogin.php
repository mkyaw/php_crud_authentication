<?php
    session_start();
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);

    mysql_connect("localhost", "root", "root") or die(mysql_error());
    mysql_select_db("php_crud_auth") or die("Cannot connect to database");
    
    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $exists = mysql_num_rows($query);
    $table_users = "";
    $table_passwords = "";
    if($exists > 0) {
        while($row = mysql_fetch_array($query)) {
            $table_users = $row["username"];
            $table_passwords = $row["password"];
        }

        if(($username == $table_users) && ($password == $table_passwords)) {
            /** $username in session ==> global variable **/
            $_SESSION['user'] = $username;
            
            /** redirect the user to user home page **/
            header("location: user_home.php");
            
            // echo "<script>alert('Logged in successfully!');</script>";
            // echo "<script>window.location.assign('index.php');</script>";
        } else {
            echo "<script>alert('Incorrect Password');</script>";
            echo "<script>window.location.assign('login.php');</script>";
        }
    
    } else {
        echo "<script>alert('Incorrect Username');</script>";
        echo "<script>window.location.assign('login.php');</script>";
    }

?>