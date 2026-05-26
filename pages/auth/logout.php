<?php
    session_start();
    session_destroy();


    header('Location: /veterinaria/pages/auth/login.html');
    exit();


?>