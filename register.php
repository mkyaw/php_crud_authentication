<html>
    <head>
        <title>Register | PHP CRUD App - Authentication</title>
    </head>
    <body>
        <h1>Registration Page</h1>
        <em><a href="index.php">Home</a></em>
        <br /><br />
        <form action="register.php" method="POST">
            <label>Enter Username:</label>
            <input type="text" name="username" required="required" />
            <br />
            <label>Enter Password:</label>
            <input type="text" name="password" required="required" />
            <br />
            <input type="submit" value="Register">
        </form>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);

    $bool = true;
    
    // Connect to server
    mysql_connect("localhost", "root", "root") or die(mysql_error());
    
    // Select database
    mysql_select_db("php_crud_auth") or die("Cannot connect to database");

    // Query table
    // Fetch all rows from query 
    // Check if username already exists
    $query = mysql_query("Select * from users");

    while($row = mysql_fetch_array($query)) {
        
        $table_users = $row["username"];
        if($username == $table_users) {
            $bool = false;
            echo "<script>alert('Username has been taken!');</script>";
            echo "<script>window.location.assign('register.php');</script>";
        }
    }

    // Execute MySQL statement to insert a new user
    if($bool) {
        mysql_query("INSERT INTO users(username, password) VALUES('$username', '$password')");
        echo "<script>alert('Successfully registered!');</script>";
        echo "<script>window.location.assign('register.php');</script>";
    }
}
?>