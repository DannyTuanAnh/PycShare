<?php
    session_start();
    unset($_SESSION['username']);
    echo "<script>window.location.replace('../../../index.php');</script>";
    exit();
?>