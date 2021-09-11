<!DOCTYPE html>
<?php
    include 'php/cnx.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="css/style.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand">
            Alice & Bob
        </a>
    </nav>

    <div id='page'>
    <?php
    if(isset($_POST['user'])){
        $id = $_POST['user'];
        $pwd = $_POST['pwd'];

        $con = mysqli_connect("localhost", "root", "", "alicebob");
        $sql = "SELECT mdp FROM user WHERE identifiant = '$id'";
        $res = $cnx -> query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pwd, $row['mdp']) == true)
        {
            header('location:php/redirect.php?connexion=true');
        }
        else
            $err = true;
    }

    ?>
        <div id='iden'>
            <form action ='index.php' method='post'>
                <center><h2>Sign in</h2></center>
                <br/>
                <input placeholder="Identifiant" class="form-control" type="text" name="user" required>
                <br/>
                <input placeholder="Password" class="form-control" type="password" name="pwd" required>
                <br/>
                <button type="submit" class="btn btn-primary btn-block">Login
                </button>
                <br/>
                <?php
                        if (isset($err)){
                            echo "<p style='color:red'>Identifiant ou mot de passe incorrect</p>";
                        }
                ?>
            </form>
        </div>
    </div>
    </body>
</html>
