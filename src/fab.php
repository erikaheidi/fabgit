<?php
include(__DIR__.'/../vendor/autoload.php');

if (!defined('STDIN')) {
    echo "sorry, but this script should only be used in the command line.";
    exit;
}

array_shift($argv);
$args = implode(' ', $argv);

$fab = new Fab\SuperFab();

$output = shell_exec("git $args");

echo $fab->paint($output);