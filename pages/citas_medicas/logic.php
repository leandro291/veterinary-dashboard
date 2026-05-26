<?php

    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;
    $fecha_hora = date('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $accion = $_POST['accion'];

        if ($accion === "registro"){

            $hora = date('H:i:s');
            $dueño = $_POST["id_dueño"];
            $mascota = $_POST["id_mascota"];
            $veterinario = $_POST["id_veterinario"];
            $tipo = $_POST['tipo'];
            $estado = $_POST["estado"];
            $duracion = $_POST["duracion"];
            $nota = $_POST["nota"];

            $consulta = "INSERT INTO cita (hora, tipo, estado, duracion, notas, id_mascota, id_dueño, id_veterinario) 
                        VALUES ('$hora', '$tipo', '$estado', '$duracion', '$nota', '$mascota', '$dueño', '$veterinario') ";

            mysqli_query($conn, $consulta);
        }
        elseif ($accion === "editar") {
            $id     = $_POST['id'];
            $estado = $_POST['estado'];

            mysqli_query($conn, "UPDATE cita SET estado = '$estado' WHERE id_cita = $id");
        }


        header('Location: ?page=citas_medicas');
        exit();
    }

    $consulta1 = "SELECT * FROM dueño";
    $consulta2 = "SELECT * FROM mascota";
    $consulta3 = "SELECT * FROM veterinario";

    $resultado1 = mysqli_query($conn, $consulta1);
    $resultado2 = mysqli_query($conn, $consulta2);
    $resultado3 = mysqli_query($conn, $consulta3);

    $dueños = mysqli_fetch_all($resultado1, MYSQLI_ASSOC);
    $mascotas = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);
    $veterinarios = mysqli_fetch_all($resultado3, MYSQLI_ASSOC);

    $consulta4 = "SELECT 
            cita.id_cita,
            cita.hora,
            cita.tipo,
            cita.estado,
            cita.duracion,
            cita.notas,
            mascota.nombre AS nombre_mascota,
            dueño.nombre AS nombre_dueño,
            dueño.apellido AS apellido_dueño,
            veterinario.nombre AS nombre_veterinario
        FROM cita
        JOIN mascota ON cita.id_mascota = mascota.id_mascota
        JOIN dueño ON cita.id_dueño = dueño.id_dueño
        JOIN veterinario ON cita.id_veterinario = veterinario.id_veterinario";

    $resultado4 = mysqli_query($conn, $consulta4);
    $citas = mysqli_fetch_all($resultado4, MYSQLI_ASSOC);

    $resultado5 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cita");
    $total_citas = mysqli_fetch_assoc($resultado5)['total'];

    $resultado6 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cita WHERE estado = 'Completada'");
    $citas_completadas = mysqli_fetch_assoc($resultado6)['total'];

    $resultado7 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cita WHERE estado = 'Pendiente'");
    $citas_pendientes = mysqli_fetch_assoc($resultado7)['total'];

    $resultado8 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cita WHERE estado = 'Cancelada'");
    $citas_canceladas = mysqli_fetch_assoc($resultado8)['total'];

    echo "<script>
        const HORA_ACTUAL = ".json_encode($fecha_hora) . ";
        const TOTAL_CITAS = " . json_encode($total_citas) . ";
        const CITAS_COMPLETADAS = " . json_encode($citas_completadas) . ";
        const CITAS_PENDIENTES = " . json_encode($citas_pendientes) . ";
        const CITAS_CANCELADAS = " . json_encode($citas_canceladas) . ";
    </script>";

    echo "<script>
        const DUEÑOS = ". json_encode($dueños) . " ;
        const MASCOTAS = " . json_encode($mascotas) . ";
        const VETERINARIOS = " . json_encode($veterinarios) . ";
        const DATA = ". json_encode($citas) .";
    </script>";

    require __DIR__ . "/../../layouts/header.php";
    require __DIR__ . "/../../layouts/sidebar.php";
    require "view.html";

?>