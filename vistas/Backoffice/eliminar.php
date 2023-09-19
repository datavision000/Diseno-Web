<?php
session_start();

// Verifica si el usuario ha iniciado sesión y tiene permisos para acceder a esta página
if (!isset($_SESSION['nom_usu']) || $_SESSION['tipo_usu'] !== 'admin') {
    header("Location: ../permisos.php"); // Redirige a la página de inicio de sesión
    exit();
}
include("../../modelos/db.php");
if(isset($_GET['cedula'])){
        $cedula = $_GET['cedula'];


        $instruccion = "delete from camionero where cedula=$cedula";
        $conexion->query($instruccion);
        header("Location: op-camioneros.php");
    } else if (isset($_GET['id_almacen_cliente'])){
        $id_almacen_cliente = $_GET['id_almacen_cliente'];


        $instruccion = "delete from almacen_cliente where id_almacen_cliente=$id_almacen_cliente";
        $conexion->query($instruccion);
        header("Location: op-almacen-cliente.php");
    }

?>