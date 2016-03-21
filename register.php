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

    echo "Username entered was: " . $username . "<br />";
    echo "Password entered was: " . $password;
}
?>