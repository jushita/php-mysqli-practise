<!DOCTYPE html>

<html>
    <head>
        <title>My SQLi connection in PHP</title>
    </head>
    <body>
    <form action="new_users.php" method="post">
        <b>User Name: </b><input type = "text" name="user_name" /><br />
        <b>User Email: </b><input type = "text" name="user_email" /><br />
        <b>User Password: </b><input type = "text" name="user_password" /><br />
        <input type="submit" name="user" value="Submit Now!" />
    </form>
<!--MySQL Connection starts here-->
    <?php
    $con = mysqli_connect("localhost","root","","mytest"); //("server name", "username","password","databasename")

    if (mysqli_connect_errno())
    {
        echo "MYSQLi Connection Failed".mysqli_connect_error();
    }
    //MySQL Connection ends here

    //Insert data into table using PHP
    if (isset($_POST['user']))
    {
        echo $user_name = $_POST['user_name'];
        echo $user_email = $_POST['user_email'];
        echo $user_password = $_POST['user_password'];
    }

     ?>





    </body>
</html>
