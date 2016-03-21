<html>
    <head>
        <title>Log In | PHP CRUD App - Authentication</title>
    </head>
    <body>
        <h1>Login Page</h1>
        <em><a href="index.php">Home</a></em>
        <br /><br />
        <form action="checklogin.php" method="POST">
            Enter Username: <input type="text" name="username" required="required" />
            <br />
            Enter Password: <input type="text" name="password" required="required" />
            <br />
            <input type="submit" value="Login">
        </form>
    </body>
</html>