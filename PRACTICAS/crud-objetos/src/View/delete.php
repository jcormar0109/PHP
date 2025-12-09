<?php
declare(strict_types=1);
session_start();
?>
<h2>Eliminar Libro</h2>
<form action="../Controller/delete-controller.php" method="post">
    <label for="id">ID del libro a eliminar:</label>
    <input type="number" name="id" id="id" required><br><br>
    <button type="submit" name="delete">Eliminar</button>
</form>
