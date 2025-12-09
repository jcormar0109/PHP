<?php
    $tiempo = time() + (3600*4);
    setcookie("username", "alice",$tiempo);
?>
<html>
<style>
</style>
<body>

<h2>Registro</h2>
<hr>
<!--
<form action="p2.php" method="POST">
    <label for="name">Nombre:</label>
    <input id ="name" name ="name" type="text" placeholder="Nombre"/>
    <br/>
    <label for="age">Edad:</label>
    <input id ="age" name ="age" type="text" placeholder="Edad"/>
    <br/>
        <input id="id" name="id" type="hidden" value="35">
        <input type="submit" name="registro">
</form>
-->
<?php

    $_SESSION['usuario'] = "Alice";

?>
<a href="p2.php">siguiente</a>

</body>

</html>


