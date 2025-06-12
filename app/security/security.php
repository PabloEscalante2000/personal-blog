<?php
$usuario_valido = 'admin';
$contrasena_valida = '1234';

// Verificar si llegaron credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Zona restringida"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autenticación requerida.';
    exit;
} else {
    // Comparar credenciales
    if ($_SERVER['PHP_AUTH_USER'] === $usuario_valido &&
        $_SERVER['PHP_AUTH_PW'] === $contrasena_valida) {
        echo "<h1>Bienvenido, " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "</h1>";
    } else {
        header('WWW-Authenticate: Basic realm="Zona restringida"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Credenciales incorrectas.';
        exit;
    }
}
?>