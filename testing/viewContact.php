<?php
include '.\include\header.php';
if (!isset($_SESSION['userName'])) {
    header('Location: authenticate.php');
}
require_once 'host_info.php';
$c_name = $_GET['name'];
$db_database = 'contactInfo';
$db_server = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db_server->connect_error) ($db_server->connect_error);
if (isset($_POST['remark']) && isset($_POST['attend'])) {
    $c_remark = $_POST['remark'];
    $c_id = $_POST['id'];
    $r_quiry = "UPDATE comment set remark='$c_remark' where id=$c_id";
    $result = $db_server->query($r_quiry);
    if (!$result) {
        echo "error in setting remark" . mysqli_error($db_server);
    }
}

$query_srtring = "Select * from comment where name=\"$c_name\"";
$result = $db_server->query($query_srtring);
if (!$result) die('unable to produce quiry ');
$row = $result->num_rows;
$row_data = $result->fetch_array(MYSQLI_ASSOC);
$c_id = $row_data['id'];
$c_name = $row_data['name'];
$c_father = $row_data['father'];
$c_mobile = $row_data['mobile'];
$c_email =  $row_data['email'];
$c_comment = $row_data['comment'];
$c_remark = $row_data['remark'];

echo <<<END
    <h1>Welcome In Sudeep Honda </h1>
    <form action="viewContact.php?name=$c_name" class="contect" method="POST">
        <label for="Name">Name:</label><br>
        <input type="text" name="Name" id="Name" value="$c_name" disabled required><br>
        <label for="Father">Father Name:</label><br>
        <input type="text" name="Father" id="Father" value="$c_father" disabled required><br>
        <label for="Mobile">Mobile No.:</label><br>
        <input type="text" name="Mobile" id="Mobile" value="$c_mobile" disabled required><br>
        <label for="Email">Email:</label><br>
        <input type="email" name="Email" id="Email" value="$c_email" disabled required><br>
        <label for="Comment">Comment:</label><br>
        <textarea name="Comment" id="Comment" cols="30" rows="10" disabled required> $c_comment</textarea><br>
        <label for="remark">Remark:</label><br>
        <textarea name="remark" id="remark" cols="30" rows="10" required>$c_remark</textarea><br>
        <input type="hidden" name="id" value="$c_id" >
        <input type="hidden" name="attend" value="yes" >
        <input type="submit" value="Submit"><br>

    </form>

</body>

</html>

END;
