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
$db_database = 'contactInfo';
$db_server = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db_server->connect_error) ($db_server->connect_error);
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $d_query = "DELETE FROM comment WHERE id = $id";
    if (!$db_server->query($d_query)) {
        echo "Delete failed " . $d_query;
    };
}
$query_srtring = "Select * from comment";
$result = $db_server->query($query_srtring);
if (!$result) die('unable to produce quiry ');
$row = $result->num_rows;
echo "<table class =\"contactData\" style =\"border:2px solid black \"> <tr> <th style =\"border:2px solid black \"> Name </th> <th style =\"border:2px solid black \"> Father Name </th><th style =\"border:2px solid black \"> Mobile No. </th><th style =\"border:2px solid black \"> Email </th><th style =\"border:2px solid black \"> Comment </th> ><th style =\"border:2px solid black \"> Action </th></tr>";
for ($i = 0; $i < $row; $i++) {
    $row_data = mysqli_fetch_row($result);
    echo "<tr>";
    for ($j = 0; $j < 6; $j++) {
        if ($j == 0) {
            continue;
        }
        if ($j == 1) {
            echo "<td style =\"border:2px solid black \"> <a href=\"viewContact.php?name=$row_data[$j]\">" . $row_data[$j] . "</a></td>";
        } else {
            echo "<td style =\"border:2px solid black \"> " . $row_data[$j] . "</td>";
        }
    }
    echo "<td>";
    echo "<form action=\"login.php\" method=\"POST\">
    <input type=\"hidden\" name=\"delete\" value=\"yes\">
    <input type=\"hidden\" name=\"id\" value=\"$row_data[0]\">
    <input type=\"submit\" value=\"DELETE RECORD\" style =\"border:2px solid black \">
     </form> ";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "
</body> </html>";
