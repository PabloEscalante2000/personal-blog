<?php
$usuario_valido = 'admin';
$contrasena_valida = '1234';

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Zona restringida"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autenticación requerida.';
    exit;
} else {
    // Comparar credenciales
    if ($_SERVER['PHP_AUTH_USER'] === $usuario_valido &&
        $_SERVER['PHP_AUTH_PW'] === $contrasena_valida) {
        require_once(__DIR__."/../views/admin/".$vista."-view.php");
    } else {
        header('WWW-Authenticate: Basic realm="Zona restringida"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Credenciales incorrectas.';
        exit;
    }
}

?>