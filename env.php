<?php
$variables = [
    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3306',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => 'root',
    'DB_DATABASE' => 'trello.loc',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}