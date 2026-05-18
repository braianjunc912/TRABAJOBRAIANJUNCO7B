<?php
session_start();
session_unset();
session_destroy();
header('Location: login.php?out=1');
exit;
