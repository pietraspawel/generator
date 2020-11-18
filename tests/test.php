<?php

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
file_put_contents(__DIR__ . "/class_example_2.json", json_encode($array));
