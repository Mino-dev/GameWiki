<?php
    session_start();
    
    $index = $_POST['index'];
    $text = $_POST['content'];
    $_SESSION['content'][$index] = $text;
    $_SESSION['changes'] = true;

?>