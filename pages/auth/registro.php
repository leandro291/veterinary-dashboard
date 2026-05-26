<?php

    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;

    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $rol = $_POST["rol"];
        $estado = $_POST["estado"];

        $hash_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        $consulta = "SELECT * FROM empleado WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conn, $consulta);
        $num_usuario = mysqli_num_rows($resultado);

        if ($num_usuario > 0){
            header('Location: /veterinaria/pages/auth/registro.html');
            exit();
        }
        else{
            $consulta2 = "INSERT INTO empleado (usuario, contraseña, rol, estado) VALUES ('$usuario', '$hash_contraseña', '$rol', '$estado')";
            mysqli_query($conn, $consulta2);
        }

        header('Location: /veterinaria/pages/auth/login.html');
        exit();
    }
?>