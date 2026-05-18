<?php
session_start();
require_once __DIR__ . '/includes/db.php';

try {
    $pdo = getPDO();
} catch (PDOException $e) {
    header('Location: login.php?err=1');
    exit;
}

$correo = trim($_POST['correo'] ?? '');
$clave = $_POST['clave'] ?? '';

$st = $pdo->prepare('SELECT * FROM usuarios WHERE correo = ? LIMIT 1');
$st->execute([$correo]);
$fila = $st->fetch();

if ($fila && isset($fila['hash_pass']) && password_verify($clave, $fila['hash_pass'])) {
    $_SESSION['usuario_id'] = (int)$fila['id'];
    $_SESSION['nombre_visible'] = $fila['nombre_visible'] ?? 'Usuario';

    header('Location: panel_usuario.php');
    exit;
}

header('Location: login.php?err=1');
exit;
