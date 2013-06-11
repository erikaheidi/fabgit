<?php
include(__DIR__.'/../vendor/autoload.php');

if (!defined('STDIN')) {
    echo "sorry, but this script should only be used in the command line.";
    exit;
}

array_shift($argv);
$args = implode(' ', array_map('escapeshellarg', $argv));

$fab = new Fab\SuperFab();

$process = popen("git $args", 'r');
while (!feof($process) && $data = fread($process, 1024)) {
    echo $fab->paint($data);
}
fclose($process);
