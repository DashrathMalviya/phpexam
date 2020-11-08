<?php
include ".\include\header.php";
?>
<h1>Welcome In Sudeep Honda </h1>
<form action="contectAction.php" class="contect" method="POST">
    <label for="Name">Name:</label><br>
    <input type="text" name="Name" id="Name" required><br>
    <label for="Father">Father Name:</label><br>
    <input type="text" name="Father" id="Father" required><br>
    <label for="Mobile">Mobile No.:</label><br>
    <input type="text" name="Mobile" id="Mobile" required><br>
    <label for="Email">Email:</label><br>
    <input type="email" name="Email" id="Email" required><br>
    <label for="Comment">Comment:</label><br>
    <textarea name="Comment" id="Comment" cols="30" rows="10" required></textarea><br>
    <input type="submit" value="Submit"><br>

</form>

</body>

</html>