<?php
include ".\include\header.php";
if (1 == 2) {
    echo '<h1>user are register </h1>';
} else {
    echo '
<div class="container">
    <div class="container1">
        <form action="register_user.php" method="POST">
            <p class="Name">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" autocomplete="off"><br>
            </p>
            <p class="UserName">
                <label for="userName">User Name:</label>
                <input type="text" name="userName" id="userName" autocomplete="off"><br>
            </p>
            <p class="Pass">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off" ><br>
            </p>
            <p class="RePassword">
                <label for="rePassword">Conform Password:</label>
                <input type="password" name="rePassword" id="rePassword" autocomplete="off"><br>
            </p>
            <p class="Submit">
                <input type="submit" value="Create">
            </p>
        </form>
    </div>
</div>
';
}

?>

</body>

</html>