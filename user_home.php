<html>
    <head>
        <title>User Home Page | PHP CRUD App - Authentication</title>
    </head>
    <?php
        session_start();
        if($_SESSION['user']) {
        } else {
            header('location:index.php');
        }
        $user = $_SESSION['user'];
    ?>
    <body>
        <h1>User Home Page</h1>
        <p>Hello <?php echo "$user" ?> !</p>
        <a href="logout.php">Click here to log out</a><br /><br />
        <form action="add.php" method="POST">
            <label>Add more to the list:</label>
            <input type="text" name="details" />
            <br />
            <label>Public post?</label>
            <input type="checkbox" name="public[]" value="yes" />
            <br />
            <input type="submit" value="Add to list" />
        </form>

        <h2 align="center">My List</h2>
        <table border="1px" width="100%">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </table>
    </body>
</html>