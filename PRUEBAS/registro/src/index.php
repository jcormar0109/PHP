<html>
<style>
</style>
<body>

<h2>Registro</h2>
<hr>

<form action="p2.php" method="POST">
    <input id ="dni" name ="dni" type="text" placeholder="DNI"/>
    <br/>
    <input id ="name" name ="name" type="text" placeholder="Nombre"/>
    <br/>
    <input id ="apellido" name ="apellido" type="text" placeholder="Apellidos"/>
    <br/>
    <select id="edad" name="edad">
        <?php
            for ($i=1; $i <= 99; $i++) {
                echo "<option>".$i."</option>";
            }
        ?>
    <br/>
    <input id="email" name="email" type="email" placeholder="Email"/>
        <br/>
    <input id="psw1" name="psw1" type="password" placeholder="Contraseña">
        <br/>
    <input id="psw2" name="psw2" type="password" placeholder="Repita la contraseña">
    <br/>
    <fieldset>
        <legend>Transporte</legend>
            <input id="coche" name="transporte" type="radio" value="Coche"/>Coche <br/>
        <input id="moto" name="transporte" type="radio" value="Moto"/>Moto<br/>
        <input id="bus" name="transporte" type="radio" value="Bus"/>Bus<br/>
    </fieldset>
        Beca<input id="beca" name="beca" type="checkbox">
        <br/>
    <input type="reset">
    <input type="submit" name="registro">
</form>

</body>

</html>


