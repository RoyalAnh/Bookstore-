<?php
    session_start();
    session_unset();
    session_destroy();
    header('location:../index.php');
    echo "<script>window.open('../index.php','_self')</script>"
?>