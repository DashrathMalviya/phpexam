
    <?php
    include ".\include\header.php";
    setcookie('u_name', 'Dashrath', time() + 60 * 5, '/');
    if (isset($_COOKIE['u_name'])) echo $_COOKIE['u_name'] . "\n";
    echo "hello there";
    ?>
    
    <h1 class="mainHeading">Wellcome in Sudeep Honda</h1>

</body>

</html>