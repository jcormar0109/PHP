<?php
    $dsn = "mysql:host=localhost;dbname=mi_bd;charset=utf8mb4";
    $usuario = "root";
    $clave = "";

    try{
        $pdo = new PDO($dsn, $usuario, $clave);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conectado";
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    //CONSULTAS:

    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);

    foreach ($stmt as $fila) {
        echo $fila["nombre"] . "<br>";
    }

    //PREPARAR CONSULTAS
    //POSICIONALES
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([1]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //MARCADORES
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["email" => "ejemplo@correo.com"]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //INSERTAR
    $smt = $pdo->prepare("INSER INTO usuarios(nombre, email) VALUES (:nombre, :email)");
    $smt->execute(["nombre" =>"Ana", "email" => "ana@mail.com"]);

    //UPDATE
    $smt = $pdo->prepare("UPDATE usuarios SET email = :email WHERE id = :id");
    $smt->execute(["email" => "nuevo@mail.com", "id" => 2]);

    //DELETE
    $smt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $smt->execute(["id" => 3]);

    $smt->rowCount();

    // una fila
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    //todas
    $filas = $stmt->fetchAll(PDO::FETCH_NUM);

    //Transacciones
    try{
        $pdo->beginTransactoion();

        $pdo->prepare("INSER INTO cuentas(nombre, saldo) VALUES ('Juan', '1100')");
        $pdo->prepare("UPDATE cuentas SET saldo = saldo - 100 WHERE id = 1");

        $pdo->commit();
    } catch (PDOException $e){
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }

    //Acabar
    $pdo = null;