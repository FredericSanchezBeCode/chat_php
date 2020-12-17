<?php
// $user = "root";
// $pass = "";

// $db = new PDO('mysql:host=localhost;dbname=chat_php;charset=utf8', $user, $pass, [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
// ]);
$user = "sql7382175";
$pass = "2JfUZmMME8";
// dbname=sql7382175
// host=sql7.freemysqlhosting.net
$db = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7382175;charset=utf8', $user, $pass, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}


function getMessages(){
    global $db;
  
    // 1. On requête la base de données pour sortir les 20 derniers messages
    $resultats = $db->query("SELECT messages.content, users.username, messages.created_at, messages.id FROM messages INNER JOIN users ON messages.id_author=users.id ORDER BY messages.id DESC LIMIT 20");
    // 2. On traite les résultats
    $messages = $resultats->fetchAll();
    // 3. On affiche les données sous forme de JSON
    echo json_encode($messages);
  }

  function postMessage(){
    global $db;

    // !array_key_exists('id_author', $_POST) ||
    if( !array_key_exists('content', $_POST)){
  
      echo json_encode(["status" => "error", "message" => "petit probllème dans le formulaire"]);
      return;
  
    }
  
    $id_author = $_POST['id_author'];
    $content = $_POST['content'];
  
    // 2. Créer une requête qui permettra d'insérer ces données
    $query = $db->prepare('INSERT INTO messages VALUES (NULL,:content,:id_author,NOW())');
    $query->execute(array(
      ":id_author" => $id_author,
      ":content" => $content
    ));
  
    // 3. Donner un statut de succes ou d'erreur au format JSON
    echo json_encode(["status" => "success"]);
  }



?>