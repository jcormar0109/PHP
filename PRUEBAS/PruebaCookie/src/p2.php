<?php

session_start();
ini_set('display_errors', 1);
?>
<html>
<head>
</head>
<body>

<h2>Datos del formulario</h2>
<hr>

<?php

$username = $_COOKIE["username"] ?? "No existe";
$name = $_SESSION["name"] ?? "No existe";
echo "<br>Hola {$username}";
echo "<br>con nombre $name";

?>

</body>
</html>
