<?php
$start = (object)[
    'time' => microtime(),
    'memory' => memory_get_usage()
];

require realpath(dirname(__FILE__)).'/vendor/autoload.php';

use Guzzle\Http\Client;

$client = new Client();


$end = (object)[
    'time' => microtime() - $start->time,
    'memory' => memory_get_usage() - $start->memory
];

$result = <<<EOD
Memory Usage : {$end->memory}
Time : {$end->time}
EOD;

file_put_contents("php://stdout", $result);
