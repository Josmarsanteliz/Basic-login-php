<?php 
//iniciando sesion
session_start();
//me devuelve un objeto de conexion
$enlace = mysqli_connect(
    'localhost',
    'root',
    '',
    'crud'
);
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial."
?>