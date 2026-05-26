<?php

    require __DIR__ . "/../../config/db.php";

    $db = new Database();
    $conn = $db->conn;
    
    $fecha_hora = date('Y-m-d H:i:s');

    $resultado1 = mysqli_query($conn, "SELECT tipo, COUNT(*) AS total FROM cita GROUP BY tipo");
    $citas_por_tipo = mysqli_fetch_all($resultado1, MYSQLI_ASSOC);

    $resultado2 = mysqli_query($conn, "SELECT especie, COUNT(*) AS total FROM mascota GROUP BY especie");
    $mascotas_por_especie = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);

    $resultado3 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cita");
    $total_citas = mysqli_fetch_assoc($resultado3)['total'];

    $resultado4 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM mascota");
    $total_pacientes = mysqli_fetch_assoc($resultado4)['total'];

    $resultado5 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM mascota WHERE estado = 'Critico'");
    $total_criticos = mysqli_fetch_assoc($resultado5)['total'];

    echo "<script>
        const HORA_ACTUAL = ".json_encode($fecha_hora) . ";
        const TOTAL_CITAS = " . json_encode($total_citas) . ";
        const TOTAL_PACIENTES = " . json_encode($total_pacientes) . ";
        const TOTAL_CRITICOS = " . json_encode($total_criticos) . ";
    </script>";

    echo "<script>
        const CITAS_TIPO = " . json_encode($citas_por_tipo) . ";
        const MASCOTAS_ESPECIE = " . json_encode($mascotas_por_especie) . ";
    </script>";

    require __DIR__ . "/../../layouts/header.php";
    require __DIR__ . "/../../layouts/sidebar.php";
    require "view.html";


?>