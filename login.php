<form action="index.php" method="post">
        <label for="">Email</label><br>
        <input type="email" name="email"><br>
        <label for="">Username</label><br>
        <input type="text" name="username"><br>
        <label for="">Password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Se connecter"><br>
    </form>
<a href="inscription.php">Veuillez vous inscrire</a>
<?php
    include ('lib/connexbd.php');

    if(isset($_POST['email'])){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt ->execute([$_POST['email']]);
        $users = $stmt->fetch();

        if($users && password_verify($_POST['pass'], $users['pass'])){
            //se connecter
            $_SESSION['id_user'] = $users['id'];
            $_SESSION['username'] = $users['username'];
            header('location: index.php');
        }else{
            echo 'Le mot de passe est incorrect';
        }
     }
?>