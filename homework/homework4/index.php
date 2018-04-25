<?php
    include "main.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Homework 4 | Sign In</title>
</head>

<body>
    <form method="get">
        <fieldset>
            <legend>Login</legend>
            Username: <input type="text"name="username" />
            <br/>
            <br/>
            Password: &nbsp;<input type="password" name="password" />
            <br/>
            <br/>
            <input type="submit" name="submit" value="Login" />
        </fieldset>
    </form>
    <?=checkLogin()?>
</body>

</html>
