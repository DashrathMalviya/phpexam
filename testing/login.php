<?php
require_once 'host_info.php';
echo <<<END
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
END;
$db_server = mysqli_connect($db_host, $db_username, $db_password);
if (!$db_server) die('unable to connect ');
$db_database = 'contactInfo';
mysqli_select_db($db_server, $db_database) or die("error in selecting database");
$query_srtring = "Select * from comment";
$result = mysqli_query($db_server, $query_srtring);
$row = mysqli_num_rows($result);
echo "<table class =\"contactData\" style =\"border:2px solid black \"> <tr> <th style =\"border:2px solid black \"> Name </th> <th style =\"border:2px solid black \"> Father Name </th><th style =\"border:2px solid black \"> Mobile No. </th><th style =\"border:2px solid black \"> Email </th><th style =\"border:2px solid black \"> Comment </th></tr>";
for ($i = 0; $i < $row; $i++) {
    $row_data = mysqli_fetch_row($result);
    echo "<tr>";
    for ($j = 0; $j < 5; $j++) {
        echo "<td style =\"border:2px solid black \">" . $row_data[$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
