<?php

namespace pietras;

use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testGenerateClass()
    {
        $array = [
            "class_name" => "Mail",
            "namespace" => "pietras",
            "const" => [
                "public const NEW" => "new",
                "public const SENT" => "sent",
            ],
            "properties" => [
                "id" => [
                    "prefix" => "private",
                    "type" => "int",
                    "default" => null,
                ],
                "userId" => [
                    "prefix" => "private",
                    "type" => "?string",
                    "default" => null,
                ],
                "userMail" => [
                    "prefix" => "private",
                    "type" => "string",
                    "default" => null,
                ],
                "title" => [
                    "prefix" => "private",
                    "type" => "string",
                ],
                "content" => [
                    "prefix" => "private",
                    "type" => "string",
                ],
                "sender" => [
                    "prefix" => "private",
                    "type" => "string",
                ],
                "status" => [
                    "prefix" => "private",
                    "type" => "string",
                    "default" => "^self::NEW",
                ],
                "dateAdded" => [
                    "prefix" => "private",
                    "type" => "?DateTime",
                    "default" => null,
                ],
                "dateSended" => [
                    "prefix" => "private",
                    "type" => "?DateTime",
                    "default" => null,
                ],
            ],
        ];
        $expected = file_get_contents(__DIR__ . "/class_example_1.php");
        $this->assertEquals($expected, Generator::generateClass($array));

        $array = [
            "properties" => [
                "id" => [
                    "prefix" => "public",
                    "type" => "\Object",
                    "default" => "^new Object()",
                ],
                "userId" => [
                    "prefix" => "protected",
                    "type" => "string",
                    "default" => "zażółć gęślą jaźń",
                ],
                "userMail" => [
                    "prefix" => "private",
                    "type" => "?string",
                    "default" => null,
                ],
                "title" => [
                    "prefix" => "private",
                    "type" => "bool",
                    "default" => true,
                ],
                "content" => [
                    "prefix" => "private",
                    "type" => "bool",
                    "default" => false,
                ],
                "sender" => [
                    "prefix" => "private",
                    "type" => "?float",
                    "default" => -666.66,
                ],
                "status" => [
                    "prefix" => "private",
                    "type" => "string",
                ],
                "dateAdded" => [
                    "prefix" => "private",
                    "type" => "DateTime",
                ],
                "dateSended" => [
                    "prefix" => "private",
                    "type" => "?DateTime",
                ],
            ],
        ];
        $expected = file_get_contents(__DIR__ . "/class_example_2.php");
        $this->assertEquals($expected, Generator::generateClass($array));
    }
}
