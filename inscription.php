<section class="inscription">
        <form action="" method="POST">
        <label for="">Username</label><br>
        <input type="text" name="username"><br>
        <label for="">Email</label><br>
        <input type="email" name="email"><br>
        <label for="">Password</label><br>
        <input type="password" name="passworld"><br>
        <label for="">Confirm your password</label><br>
        <input type="password" name="pass2"><br>
        <input type="submit" name="envoi" value="Envoyer">
        </form>
    </section>
<?php
    include ('lib/connexbd.php');

        /*$email = isset($_POST["email"]);*/
        if(isset($_POST['email'])) {
        if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo($_POST['email']." is not a valid email adress");
        }else{
            echo($_POST['email']." is valid email adress");
        }
    }
           // es ce que formulaire bien envoye
     if (isset($_POST['pass'])){
        // vérification des 2 mots de passe
        if($_POST['passworld'] == $_POST['pass2']){
       
            $stmt = $pdo -> prepare('INSERT into users (username, email, passworld) values ( ?, ?, ? )');
            echo "test";

            $stmt ->execute(array(
                $_POST['username'],
                $_POST['email'],
                password_hash($_POST['passworld'], PASSWORD_DEFAULT)
            ));
            // header('location: index.php');
        }
        else {
            echo 'Les mots de passe ne correspondent pas';
        }
    } 
?>