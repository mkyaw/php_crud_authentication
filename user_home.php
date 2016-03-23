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
                <th>Post Time</th>
                <th>Edit Time</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Public Post</th>
            </tr>
            <?php
                mysql_connect("localhost", "root", "root") or die(mysql_error());
                mysql_select_db("php_crud_auth") or die("Cannot select the table");
                $query = mysql_query("Select * from list");

                while($row = mysql_fetch_array($query))
                {
                    Print "<tr>";
                        Print '<td align="center">'. $row['id'] . "</td>";
                        Print '<td align="center">'. $row['details'] . "</td>";
                        Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
                        Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
                        Print '<td align="center"><a href="edit.php">edit</a> </td>';
                        Print '<td align="center"><a href="delete.php">delete</a> </td>';
                        Print '<td align="center">'. $row['public']. "</td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </body>
</html>