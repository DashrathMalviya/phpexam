<?php
// getting informission from form in variables 
$c_name = $_POST['Name'];
$c_father = $_POST['Father'];
$c_mobile = $_POST['Mobile'];
$c_email = $_POST['Email'];
$c_comment = $_POST['Comment'];
//setup for login 
require_once 'host_info.php';
$db_server = mysqli_connect($db_host, $db_username, $db_password);
if (!$db_server) {
    die("unable to connect");
}
$db_database = 'contactInfo';
mysqli_select_db($db_server, $db_database) or die("error in selecting database");
$query_string = "insert into comment(name,father,mobile,email,comment) values(\""  . $c_name . " \",\"" . $c_father . "\",\"" . $c_mobile . "\",\"" . $c_email . "\",\"" . $c_comment . "\")";
$result = mysqli_query($db_server, $query_string);
if (!$result) die('query faild');
else echo $result;
echo "Thank you for your Suggetion :)";
echo "<button> <a href=\"./index.html\">New</a></button>";
?>