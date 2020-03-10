<?php
    session_start();
    unset($_SESSION['client']);
    unset($_SESSION['log']);
    $_SESSION['changes']=false;
    header("Location: index.php");
?>