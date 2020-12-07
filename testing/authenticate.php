<?php
include ".\include\header.php";
if (isset($_SESSION['userName'])) {
    header('Location: ./login/');
} else {
    require_once 'host_info.php';
    require_once ".\include\salting.php";

    if (!empty($_POST['userName']) && !empty($_POST['password'])) {
        $db_database = 'userinfo';
        $db_server = new mysqli($db_host, $db_username, $db_password, $db_database);
        if ($db_server->connect_error) die($db_server->connect_error);
        $tempUn = mysql_entities_fix_string($db_server, $_POST['userName']);
        $tempPw = mysql_entities_fix_string($db_server, $_POST['password']);
        $u_query = "select * from logininfo where userName ='$tempUn'";
        $u_result = $db_server->query($u_query);
        if ($db_server->connect_error) die($db_server->connect_error);
        $dataRow = $u_result->fetch_array(MYSQLI_ASSOC);
        $name = $dataRow['name'];
        $userName = $dataRow['userName'];
        $password = $dataRow['password'];
        $name = $dataRow['name'];
        $token = hash('ripemd128', $preSalt . $tempPw . $postSalt);
        if ($password == $token) {
            $_SESSION['name'] = $name;
            $_SESSION['userName'] = $userName;
            $u_result->close();
            $db_server->close();
            header('Location: ./login/');
        } else {
            die("Wrong combination of u & p");
        }
    } else {
        echo '
    <div class="container">
        <div class="container1">
            <form action="authenticate.php" method="POST">

                <label for="userName">User Name:</label>
                <input type="text" name="userName" id="userName" autocomplete="off"><br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off"><br>

                <input type="submit" value="Login">

            </form>
        </div>
    </div>
        ';
    }
}
?>


</body>

</html>