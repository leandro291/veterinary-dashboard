<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: /veterinaria/pages/auth/login.html');
        exit();
    }

    $page = $_GET['page'] ?? 'home';
    $pages = ['home', 'patients', 'veterinarians', 'citas_medicas'];


    if (in_array($page, $pages)) {
        require '../pages/' . $page . '/logic.php';
    } else {
        require '../pages/home/logic.php';
    }

?>