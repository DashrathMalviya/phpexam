<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="Refresh" content="0; url='pickMenu.html'"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php
    setcookie('u_name', 'Dashrath', time() + 60 * 5, '/');
    if (isset($_COOKIE['u_name'])) echo $_COOKIE['u_name'] . "\n";
    echo "hello there";
    ?>
    <div class="nav">
        <ul>
            <li class="marginLeft-0 marginRight-10"><a href="index.html">Home</a></li>
            <li class="marginLeft-10 marginRight-10"><a href="./services.html">Services</a></li>
            <li class="marginLeft-10 marginRight-10"><a href="./contect.html">Contact us</a></li>
            <li class="marginLeft-10 marginRight-10"><a href="./about.html">About</a></li>
            <button class="loginButton"><a href="login.php">Login</a></button>
        </ul>
    </div>
    </div>
    <h1 class="mainHeading">Wellcome in Sudeep Honda</h1>

</body>

</html>