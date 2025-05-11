<?php
    session_start();
    unset($_SESSION['username']);
    echo "<script>window.location.replace('/PycShare/index.php');</script>";
    exit();
?>