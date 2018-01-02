<!DOCTYPE html>

<html>
    <head>
        <title>My SQLi connection in PHP</title>
    </head>
    <body>
        <form action="new_users.php" method="post">
            <b>User Name: </b><input type = "text" name="user_name" /><br />
            <b>User Email: </b><input type = "text" name="user_email" /><br />
            <b>User Password: </b><input type = "password" name="user_password" /><br />
            <input type="submit" name="user" value="Submit Now!" />
        </form>
        <!--Select Data starts here-->
        <h3><a href = "new_users.php?view">View Users:</a></h3>
        <?php
            $con = mysqli_connect("localhost","root","","mytest"); //("server name", "username","password","databasename")

            if (mysqli_connect_errno())
            {
                echo "MYSQLi Connection Failed".mysqli_connect_error();
            }
            if(isset($_GET['view'])){
                echo "
                <table width = '800' border = '1' bgcolor = 'pink'>
                    <tr align = 'center'>
                        <th>User No.</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Password</th>
                        <th>Delete User</th>
                        <th>Update User</th>
                    </tr>

                </table>
                ";

                $select_users = "select * from new_user";
                $run_users = mysqli_query($con, $select_users);

                while($row=mysqli_fetch_array($run_users)){
                    $u_id = $row[0];
                    $u_name = $row[1];
                    $u_email = $row[2];
                    $u_password = $row[3];

                    echo "
                    <table width = '800' border = '1' bgcolor = 'pink'>
                        <tr align = 'center'>
                            <td>$u_id</td>
                            <td>$u_name</td>
                            <td>$u_email</td>
                            <td>$u_password</td>
                            <td>DELETE</td>
                            <td>UPDATE</td>
                        </tr>
                    </table>
                    ";
                }
            }


        ?>
        <!--Select Data ends here-->
        <!--MySQL Connection starts here-->
        <?php
            $con = mysqli_connect("localhost","root","","mytest"); //("server name", "username","password","databasename")

            if (mysqli_connect_errno())
            {
                echo "MYSQLi Connection Failed".mysqli_connect_error();
            }
            //MySQL Connection ends here

            //Insert data commands into table starts using PHP
            if (isset($_POST['user']))
            {
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];

                $query = "insert into new_user(user_name, user_email, user_password) value('$user_name','$user_email','$user_password')";

                $insert_query = mysqli_query($con, $query);
            }

            //Insert data commands into table ends using PHP

         ?>





    </body>
</html>
