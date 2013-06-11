<?php
include('phar://fab/Fab.php');
include('phar://fab/SuperFab.php');
include('phar://fab/Factory.php');

if (!defined('STDIN')) {
    echo "sorry, but this script should only be used in the command line.";
    exit;
}

array_shift($argv);
$args = implode(' ', $argv);

$fab = new Fab\SuperFab();

$output = shell_exec("git $args");

echo $fab->paint($output);