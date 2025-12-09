<html>
<head>
    <!--<link rel="stylesheet" href="index.css">-->
</head>
<body>

<div class="container">
    <h2>P2</h2>
    <hr>

    <div class="resultado">
        <?php
        require_once("tools.php");

        $number = $_POST['num1'];

        function multiplicar(int|float $num):void{
            for ( $i = 1; $i <= 10; $i++ ) {
                $mult = $num * $i;
                echo "$num * $i = <b>$mult</b><br>";
            }
        }

        multiplicar($number);
        ?>
    </div>
</div>

</body>
</html>
