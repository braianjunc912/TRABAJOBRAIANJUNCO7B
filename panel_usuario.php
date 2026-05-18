<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Panel</title><link rel="stylesheet" href="styles.css"></head><body>
<h1>Panel de usuario</h1>
<p>Hola, <?php echo htmlspecialchars($_SESSION['nombre_visible'] ?? 'Usuario', ENT_QUOTES, 'UTF-8'); ?></p>
<p><a href="index.php">Inventario</a> | <a href="logout.php">Salir</a></p>
</body></html>
