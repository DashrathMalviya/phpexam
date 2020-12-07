<?php
include_once ".\include\salting.php";
include_once ".\include\header.php";
require_once 'host_info.php';
if (
    !empty($_POST['name']) &&
    !empty($_POST['userName']) &&
    !empty($_POST['password']) &&
    !empty($_POST['rePassword'])
) {
    $name  = $_POST['name'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
    $server = new mysqli($db_host, $db_username, $db_password, 'userinfo');
    $pMatch = $password == $rePassword;
    $uQuery = "select userName from logininfo where userName = '$userName'";
    $uResult = $server->query($uQuery);
    if ($server->connect_error) die($server->connect_error);
    $row = $uResult->num_rows;
    $uAvailable = $row == 0;
    if (!$pMatch) {
        echo
            '
        <script>
            document.write("hello password dosent match");
        </script>';
    } else {
        if ($uAvailable && $pMatch) {
            $token = hash('ripemd128', $preSalt . $password . $postSalt);
            $query = "INSERT into logininfo values('$name','$userName','$token')";
            header('Location: index.php');
            if (!$server->query($query)) {
                die('some error' . mysqli_error($server));
            }
        } else {

            echo '
            <script>
                alert("User name is taken");
            </script>
            <h> Go back to the pager<h1>';
        }
    }
} else {
    echo '
<div class="container">
    <div class="container1">
        <form action="register_user.php" method="POST">
           
                <label for="name" id="lName">Name:</label>
                <input type="text" name="name" id="name" ><br>
           
           
                <label for="userName">User Name:</label>
                <input type="text" name="userName" id="userName" autocomplete="off"><br>
        
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off" ><br>
          
          
                <label for="rePassword">Conform Password:</label>
                <input type="password" name="rePassword" id="rePassword" autocomplete="off"><br>
           
            
                <input type="submit" value="Create">
           
        </form>
    </div>
</div>
';
}

?>

</body>

</html>