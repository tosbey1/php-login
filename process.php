<?php 
    // Get values passed from form in login.php file
    $username = $_POST["user"];
    $password = $_POST["pass"];

    // to prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    // connect to the server and select database
    mysqli_connect("localhost","root", "");
    mysqli_select_db("login");

    // Query the database for user
    $result = mysqli_query("select * from users where username = '$username' and password = '$password'") 
                or die("Failed to query database ".mysqli_error());
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password)  {
        echo "Login success!! Welcome ".$row['username'];
    } else {
        echo 'Failed to login!';
    }
?>