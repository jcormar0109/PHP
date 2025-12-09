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

    function dump ($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

?>

</body>
</html>