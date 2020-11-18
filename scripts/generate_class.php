<?php

/**
* Skrypt generujący klasę.
* Klasa jest generowana do pliku /output/{NazwaKlasy.php}.
* Parametry do wprowadzenia przez usera:
* - namespace
* - nazwa klasy
* - enter (dalej) lub nazwa stałej z prefixem, np: public const STALA
*       - wartość stałej
* - enter (koniec) lub nazwa pola
*       - prefix pola do wyboru (private, protected, public)
*       - typ pola ręcznie (int, ?int, Object etc.)
*       - enter (dalej) lub wartość default
*/

namespace pietras;

use pietras\ConsoleMethods as cm;

require __DIR__ . "/../vendor/autoload.php";

$array = [];
echo "namespace:\r\n";
$input = trim(fgets(STDIN));
if (!empty($input)) {
    $array["namespace"] = $input;
}
echo "class name:\r\n";
$input = trim(fgets(STDIN));
if (!empty($input)) {
    $array["class_name"] = $input;
}
do {
    echo "const name with prefix, ex: public const CONST or enter (no more consts):\r\n";
    $constName = trim(fgets(STDIN));
    if (empty($constName)) {
        break;
    }
    echo "const value, for strings type value between quotemarks:\r\n";
    $constValue = cm::convertToType(trim(fgets(STDIN)));
    $array["const"][$constName] = $constValue;
} while (true);

do {
    echo "property name or enter (no more properties):\r\n";
    $propertyName = trim(fgets(STDIN));
    if (empty($propertyName)) {
        break;
    }
    echo "select access:\r\n";
    echo "enter. private\r\n";
    echo "1. protected\r\n";
    echo "0. public\r\n";
    $access = trim(fgets(STDIN));
    echo "field type (int, ?int, array, ObjectOfSomeClass, etc.):\r\n";
    $type = trim(fgets(STDIN));
    echo "default value, for strings type value between quotemarks or enter (no default value):\r\n";
    $default = trim(fgets(STDIN));

    switch ($access) {
        case '1':
            $access = "protected";
            break;
        case '0':
            $access = "public";
            break;
        default:
            $access = "private";
            break;
    }
    $array["properties"][$propertyName] = [
        "prefix" => $access,
        "type" => $type,
    ];
    if (!empty($default)) {
        $array["properties"][$propertyName]["default"] = cm::convertToType($default);
    }
} while (true);

$class = Generator::generateClass($array);
if (isset($array['class_name'])) {
    $path = __DIR__ . "/../output/{$array['class_name']}.php";
} else {
    $path = __DIR__ . "/../output/ClassName.php";
}
file_put_contents($path, $class);
echo "class saved in {$path}.";
