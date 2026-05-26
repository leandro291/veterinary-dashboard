<?php
    session_start();
    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;

    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];

        $consulta = "SELECT * FROM empleado WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conn, $consulta);
        $user = mysqli_fetch_assoc($resultado);

        if ($user && password_verify($contraseña, $user["contraseña"])){
            $_SESSION["usuario"] = $user["usuario"];
            $_SESSION["rol"] = $user["rol"];

            header('Location: /veterinaria/public/?page=home');
            exit();
        }
        else{
            header('Location: /veterinaria/pages/auth/login.html');
            exit();
        }
    }
?>