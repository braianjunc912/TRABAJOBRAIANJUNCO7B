<?php
require_once __DIR__ . '/includes/db.php';
$pdo = getPDO();
$res = $pdo->query('SELECT correo, nombre_visible, hash_pass FROM usuarios ORDER BY id ASC');
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Usuarios</title><link rel="stylesheet" href="styles.css"></head><body>
<h1>Usuarios</h1>
<table border="1">
<tr><th>Correo</th><th>Nombre</th><th>Hash</th></tr>
<?php while ($row = $res->fetch()) { ?>
<tr>
<td><?php echo htmlspecialchars($row['correo'], ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($row['nombre_visible'], ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($row['hash_pass'], ENT_QUOTES, 'UTF-8'); ?></td>
</tr>
<?php } ?>
</table>
<p><a href="index.php">Inicio</a></p>
</body></html>
