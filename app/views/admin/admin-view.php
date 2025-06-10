<?php
$usuario_esperado = 'admin';
$contrasena_esperada = '12345';

// Verificamos si el cliente ya mandó usuario y contraseña
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $usuario_esperado ||
    $_SERVER['PHP_AUTH_PW'] !== $contrasena_esperada) {

    // Si no hay credenciales o son incorrectas, pedimos autenticación
    header('WWW-Authenticate: Basic realm="Zona Segura"');
    header('HTTP/1.0 401 Unauthorized');
    ?>
    
    <div class="w-full h-dvh flex justify-center items-center font-bold text-3xl">
        <h1>Denied Access</h1>
    </div>
    <?php
    exit;
}

// Si las credenciales son correctas, continúa la ejecución
?>
<div>Welcome</div>
