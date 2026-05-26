<?php

    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;
    $fecha_hora = date('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $accion = $_POST['accion'];

        if ($accion === "registro"){

            $dni = $_POST['dni'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $apellido_cliente = $_POST['apellido_cliente'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];

            mysqli_query($conn, "INSERT INTO dueño (DNI, nombre, apellido, telefono, direccion, correo) 
                                    VALUES ('$dni', '$nombre_cliente', '$apellido_cliente', '$telefono', '$direccion', '$correo')");
            
            $dueño_id = mysqli_insert_id($conn);

            $nombre  = $_POST['nombre'];
            $especie = $_POST['especie'];
            $raza    = $_POST['raza'];
            $edad    = $_POST['edad'];
            $estado  = $_POST['estado'];
            $datetime = date('Y-m-d H:i:s');

            mysqli_query($conn,"INSERT INTO mascota (nombre, especie, raza, edad, estado, id_dueño, fecha_registro) 
                                VALUES ('$nombre', '$especie', '$raza', '$edad', '$estado', '$dueño_id', '$datetime')");
        }
        elseif ($accion == "borrar"){

            $id = $_POST['id'];

            $consulta = "SELECT id_dueño FROM mascota WHERE id_mascota = $id"; 
            $resultado = mysqli_query($conn, $consulta);
            $mascota = mysqli_fetch_assoc($resultado);

            $dueño_id = $mascota['id_dueño'];

            mysqli_query($conn, "DELETE FROM cita WHERE id_mascota = $id");
            mysqli_query($conn, "DELETE FROM mascota WHERE id_dueño = $dueño_id");
            mysqli_query($conn, "DELETE FROM dueño WHERE id_dueño = $dueño_id");

        }
        elseif ($accion == "editar"){

            $id_seleccionado = $_POST["id"];

            $dni = $_POST['dni'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $apellido_cliente = $_POST['apellido_cliente'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];


            $consulta = "SELECT id_dueño FROM mascota WHERE id_mascota = '$id_seleccionado'";
            $resultado = mysqli_query($conn, $consulta);
            $mascota = mysqli_fetch_assoc($resultado);

            $dueño_id = $mascota['id_dueño'];

            $consulta1 = "UPDATE dueño SET DNI = '$dni', nombre = '$nombre_cliente', apellido = '$apellido_cliente',  
                                        telefono = '$telefono', direccion = '$direccion', correo = '$correo' WHERE id_dueño = '$dueño_id' ";

            $nombre  = $_POST['nombre'];
            $especie = $_POST['especie'];
            $raza    = $_POST['raza'];
            $edad    = $_POST['edad'];
            $estado  = $_POST['estado'];

            $consulta2 = "UPDATE mascota SET nombre = '$nombre', especie = '$especie', raza = '$raza', edad = '$edad', estado = '$estado' WHERE id_mascota = '$id_seleccionado'";

            mysqli_query($conn, $consulta2);
            mysqli_query($conn, $consulta1);
        }

        header('Location: ?page=patients');
        exit();
    }

    $consulta = "SELECT 
                    mascota.id_mascota, 
                    mascota.nombre, 
                    mascota.especie, 
                    mascota.raza, 
                    mascota.edad, 
                    mascota.estado,
                    mascota.fecha_registro,
                    dueño.nombre AS nombre_dueño,
                    dueño.telefono,
                    dueño.dni,
                    dueño.apellido,
                    dueño.direccion,
                    dueño.correo
                FROM mascota
                JOIN dueño ON mascota.id_dueño = dueño.id_dueño";

    $resultado = mysqli_query($conn, $consulta);
    $pacientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    echo "
    <script>
    const HORA_ACTUAL = ".json_encode($fecha_hora) . ";
    const DATA = " . json_encode($pacientes) . "</script>";

    require __DIR__ . "/../../layouts/header.php";
    require __DIR__ . "/../../layouts/sidebar.php";
    require "view.html";

?>