<?php

    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;
    $fecha_hora = date('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $accion = $_POST['accion'];

        if ($accion === "registro"){

            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $dni = $_POST['dni'];
            $especialidad = $_POST['especialidad'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];

            $consulta = "INSERT INTO veterinario (nombre, apellido, dni, especialidad, telefono, correo) 
                        VALUES ('$nombres', '$apellidos', '$dni', '$especialidad', '$telefono', '$correo')";

            mysqli_query($conn, $consulta);
        }

        elseif ($accion === "editar"){

            $id           = $_POST['id'];
            $nombre       = $_POST['nombre'];
            $apellido     = $_POST['apellido'];
            $dni          = $_POST['dni'];
            $especialidad = $_POST['especialidad'];
            $telefono     = $_POST['telefono'];
            $correo       = $_POST['correo'];

            mysqli_query($conn, "UPDATE veterinario SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', 
                especialidad = '$especialidad', telefono = '$telefono', correo = '$correo' WHERE id_veterinario = '$id'");
        }

        elseif ($accion === "borrar"){

            $id = $_POST['id'];

            mysqli_query($conn, "DELETE FROM cita WHERE id_veterinario = $id");
            mysqli_query($conn, "DELETE FROM veterinario WHERE id_veterinario = $id");
        }

        header('Location: ?page=veterinarians');
        exit();
    }
    

    $consulta = "SELECT * FROM veterinario";
    $resultado = mysqli_query($conn, $consulta);
    $veterinarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    echo "<script>
    const HORA_ACTUAL = ".json_encode($fecha_hora) . ";
    const DATA = " . json_encode($veterinarios) . "</script>";

    require __DIR__ . "/../../layouts/header.php";
    require __DIR__ . "/../../layouts/sidebar.php";
    require "view.html";

?>