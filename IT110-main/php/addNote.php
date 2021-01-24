<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';
/** @var Connection $connection */
$connection = require_once 'pdo.php';

// Validate note object;
$id = $_POST['id'] ?? '';
if ($id){
    $connection->updateNote($id, $_POST);
} else {
    if(!empty($_POST['title'])){
        $connection->addNote($_POST);
    }else{
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
}

header('Location: ../html/welcome.php');
