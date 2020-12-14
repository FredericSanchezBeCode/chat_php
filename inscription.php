<section class="inscription">
        <form action="" method="POST">
        <label for="">First Name</label><br>
        <input type="text" name="first_name"><br>
        <label for="">Last Name</label><br>
        <input type="text" name="last_name"><br>
        <label for="">Email</label><br>
        <input type="email" name="email"><br>
        <label for="">Password</label><br>
        <input type="password" name="pass"><br>
        <label for="">Password</label><br>
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
        if($_POST['pass'] == $_POST['pass2']){
       
            $stmt = $pdo -> prepare('INSERT into users (first_name, last_name, email, pass) values ( ?, ?, ?, ? )');
            echo "test";

            $stmt ->execute(array(
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['email'],
                password_hash($_POST['pass'], PASSWORD_DEFAULT)
            ));
            header('location: index.php');
        }
        else {
            echo 'Les mots de passe ne correspondent pas';
        }
    } 
?>