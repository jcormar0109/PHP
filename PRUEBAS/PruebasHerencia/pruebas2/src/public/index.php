<?php

use App\Model\Producto;
use App\Model\Bebida;

require_once "../vendor/autoload.php";

// spl_autoload_register(function ($class) {
//     $file = dirname(__DIR__) . "/" . lcfirst(str_replace("\\", "/", $class)) . ".php";

//     if (file_exists($file)) {
//         require $file;
//     }
// });

class MiError extends Exception
{

}

set_exception_handler(function ($e) {
    echo "ERROR DESCONTROLADO";
});

try {
    $agua = new Bebida("Agua");
    throw new MiError("Error");
} catch (IntlException $e) {
    echo "ERROR!!";
}


