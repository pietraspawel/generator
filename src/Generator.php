<?php

namespace pietras;

/**
* Klasa udostępnia metody generujące standardowe klasy i powiązane z nimi tabele w bazie danych.
*/
class Generator
{
    /**
    * Generuje klasę.
    * $array = [
    *   "class_name" => "ClassName",
    *   "namespace" => przestrzeń nazw,
    *   "const" => [
    *       "public const STAŁA1" => "wartość1",
    *       "private const STAŁA2" => "wartość2"
    *       ...
    *       "protected STAŁAn" => "wartośćn"
    *   ],
    *   "properties"=> [
    *       "pole1" => [
    *           "prefix" => "protected static",
    *           "type" => "?int",
    *       ],
    *       "pole2" => [
    *           "prefix" => "private",
    *           "type" => "?string",
    *       ],
    *       ...
    *       "polen" => [
    *           "prefix" => "private",
    *           "type" => "?string",
    *       ],
    *   ],
    * ];
    */
    public static function generateClass(array $array): string
    {
        $class = "<?php\n\n";
        $class .= self::generateNamespace($array);
        $class .= self::generateClassName($array);
        if (isset($array["const"])) {
            $class .= self::generateConsts($array["const"]);
        }
        $class .= self::generateProperties($array["properties"]);
        if (!empty($array["properties"])) {
            $class .= self::generateConstructor($array["properties"]);
            $class .= self::generateGetters($array["properties"]);
            $class .= self::generateSetters($array["properties"]);
        }
        $class .= "}\n";
        return $class;
    }

    /**
    * Generuje przestrzeń nazw.
    */
    private static function generateNamespace(array $array): string
    {
        $class = "";
        if (isset($array["namespace"])) {
            $class .= "namespace {$array['namespace']};\n\n";
        }
        return $class;
    }

    /**
    * Generuje nazwę klasy.
    */
    private static function generateClassName(array $array): string
    {
        $class = "";
        if (isset($array["class_name"])) {
            $class .= "class {$array['class_name']}\n{\n";
        } else {
            $class .= "class ClassName\n{\n";
        }
        return $class;
    }

    /**
    * Generuje stałe klasy.
    */
    private static function generateConsts(array $consts): string
    {
        $class = "";
        foreach ($consts as $key => $value) {
            if (is_string($value)) {
                $class .= "    {$key} = \"{$value}\";\n";
            } else {
                $class .= "    {$key} = {$value};\n";
            }
        }
        return $class;
    }

    /**
    * Generuje pola klasy.
    */
    private static function generateProperties(array $properties): string
    {
        $class = "";
        foreach ($properties as $key => $property) {
            $class .= "    {$property['prefix']} \$$key;\n";
        }
        return $class;
    }

    /**
    * Generuje konstruktor klasy.
    */
    private static function generateConstructor(array $properties): string
    {
        $class = "\n";
        $class .= "    public function __construct(array \$array)\n";
        $class .= "    {\n";
        foreach ($properties as $name => $property) {
            $snake_name = StringMethods::camelToSnake($name);
            $suffix = "";
            if (
                array_key_exists("default", $property)
                && is_string($property["default"])
                && substr($property["default"], 0, 1) == "^"
            ) {
                $suffix .= " ?? " . substr($property["default"], 1);
            } elseif (array_key_exists("default", $property) && is_string($property["default"])) {
                $suffix .= " ?? \"{$property['default']}\"";
            } elseif (array_key_exists("default", $property) && $property["default"] === null) {
                $suffix .= " ?? null";
            } elseif (array_key_exists("default", $property) && $property["default"] === true) {
                $suffix .= " ?? true";
            } elseif (array_key_exists("default", $property) && $property["default"] === false) {
                $suffix .= " ?? false";
            } elseif (array_key_exists("default", $property)) {
                $suffix .= " ?? {$property['default']}";
            }
            $class .= "        \$this->{$name} = \$array[\"{$snake_name}\"]{$suffix};\n";
        }
        $class .= "    }\n";
        return $class;
    }

    /**
    * Generuje gettery klasy.
    */
    private static function generateGetters(array $properties): string
    {
        $class = "";
        foreach ($properties as $name => $property) {
            $getterName = "get" . strtoupper($name[0]) . substr($name, 1);
            $class .= "\n";
            $class .= "    public function {$getterName}(): {$property['type']}\n";
            $class .= "    {\n";
            $class .= "        return \$this->{$name};\n";
            $class .= "    }\n";
        }
        return $class;
    }

    /**
    * Generuje settery klasy.
    */
    private static function generateSetters(array $properties): string
    {
        $class = "";
        foreach ($properties as $name => $property) {
            $setterName = "set" . strtoupper($name[0]) . substr($name, 1);
            $class .= "\n";
            $class .= "    public function {$setterName}({$property['type']} \$value): self\n";
            $class .= "    {\n";
            $class .= "        \$this->{$name} = \$value;\n";
            $class .= "        return \$this;\n";
            $class .= "    }\n";
        }
        return $class;
    }
}
