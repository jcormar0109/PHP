<?php
declare(strict_types=1);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
    $lista =[
        ["id" => 1, "nombre" => "Alice"],
        ["id" => 2, "nombre" => "Bob"],
        ["id" => 3, "nombre" => "Charlie"],
        ["id" => 4, "nombre" => "Eve"],
        ["id" => 5, "nombre" => "Fernand"],
    ];

    foreach ($lista as $persona) {
        foreach ($persona as $key => $value) {
            echo $key . " " . $value . "<br>";
        }
        echo "<br/>\n";
    }
?>

</body>
</html>