<?php
    session_start();
    unset($_SESSION['client']);
    unset($_SESSION['log']);
    header("Location: index.php");
?>