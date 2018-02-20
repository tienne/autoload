<?php
list($usec, $sec) = explode(' ', microtime());

$start = (object)[
    'time' => (float)$usec + (float)$sec,
    'memory' => memory_get_usage()
];


require realpath(dirname(__FILE__)).'/vendor/autoload.php';

use Guzzle\Http\Client;

$client = new Client();


list($usec, $sec) = explode(' ', microtime());

$end = (object)[
    'time' => (((float)$usec + (float)$sec) - $start->time),
    'memory' => memory_get_usage() - $start->memory
];

$result = <<<EOD
Memory Usage : {$end->memory}
Time : {$end->time}
EOD;

file_put_contents("php://stdout", $result);
