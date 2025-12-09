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

    function multiplicar(int|float $num):void{
        for ( $i = 1; $i <= 10; $i++ ) {
            $mult = $num * $i;

            echo "$num * $i = <b>$mult</b> <br>";
        };
    };

    $num = 1;

    multiplicar($num);

?>

</body>
</html>
