<?php
session_start();
session_unset();     // Elimina todas las variables de sesión
session_destroy();   // Destruye la sesión

// Borramos la cookie
setcookie("usuario", "", time() - 3600, "/");

header("Location: login.php");
exit();