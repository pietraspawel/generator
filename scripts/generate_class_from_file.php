<?php

/**
* Skrypt generujący klasę z pliku .json.
* Ścieżka podawana jest z konsoli.
* Plik wynikowy jest generowany do pliku /output/{NazwaKlasy.php}.
*/

namespace pietras;

require __DIR__ . "/../vendor/autoload.php";

echo "you are here: " . __DIR__ . "\r\n";
echo "enter path to .json file:\r\n";
$path = trim(fgets(STDIN));
$array = json_decode(file_get_contents(__DIR__ . $path), true);
$class = Generator::generateClass($array);
if (isset($array['class_name'])) {
    $path = __DIR__ . "/../output/{$array['class_name']}.php";
} else {
    $path = __DIR__ . "/../output/ClassName.php";
}
file_put_contents($path, $class);
echo "class saved in {$path}.";
