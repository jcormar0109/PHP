<?php
    $dsn = "mysql:host=db;dbname=my_application_db;charset=utf8mb4";
    $usuario = "app_user";
    $clave = "app_password";

    function getTodosLosLibros($pdo, $sql){
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cont = 1;
        foreach ($resultado as $fila) {
            echo "<br>LIBRO $cont:<br>";
            echo "Titulo: " . $fila["titulo"] . "<br>";
            echo "Autor: " . $fila["autor"] . "<br>";
            echo "Precio: " . $fila["pvp"] . "<br>";
            $cont ++;
        }
    }

    try{
        $pdo = new PDO($dsn, $usuario, $clave);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = 1;
        $sql = "SELECT * FROM libros;
        getTodosLosLibros($pdo, $sql);

    }catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

