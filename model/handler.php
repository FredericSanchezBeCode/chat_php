<?php
namespace model;
$user = "sql7382175";
$pass = "2JfUZmMME8";

$db = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7382175;charset=utf8', $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


function getMessages(){
    global $db;
  
    // 1. On requête la base de données pour sortir les 20 derniers messages
    $resultats = $db->query("SELECT messages.content, users.username, messages.created_at FROM messages INNER JOIN users ON messages.user_id=users.id ORDER BY created_at DESC LIMIT 10");
    // 2. On traite les résultats
    $messages = $resultats->fetchAll();
    // 3. On affiche les données sous forme de JSON
    echo json_encode($messages);
  }

  function postMessage(){
    global $db;

    
    if(!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)){
  
      echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
      return;
  
    }
  
    $_SESSION[user_id] = $_POST[user_id];
    $content = $_POST['content'];
  
    // 2. Créer une requête qui permettra d'insérer ces données
    $query = $db->prepare('INSERT INTO messages SET  content = :content, author = :author, created_at = NOW()');
  
    $query->execute([
      "user_id" => $user_id,
      "content" => $content
    ]);
  
    // 3. Donner un statut de succes ou d'erreur au format JSON
    echo json_encode(["status" => "success"]);
  }



?>