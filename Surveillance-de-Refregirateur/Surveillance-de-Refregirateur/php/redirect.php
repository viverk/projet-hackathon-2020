<?php
    include 'cnx.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <script src="jquery-3.1.1.js"></script>
    </head>
<?php

if(isset($_GET['connexion']))
{
    header('location:courbes.php');
}
else
    header('location:index.php');
?>
</html>
