<?php

$package_name = 'fabgit.phar';


	$phar = new Phar(__DIR__ . '/../' . $package_name, 0, 'fab');
	$phar->startBuffering();

	addFile($phar, __DIR__  . '/../src/fab.php');
	addFile($phar, __DIR__  . '/../vendor/whatthejeff/fab/src/Fab/Fab.php');
	addFile($phar, __DIR__  . '/../vendor/whatthejeff/fab/src/Fab/SuperFab.php');
	addFile($phar, __DIR__  . '/../vendor/whatthejeff/fab/src/Fab/Factory.php');

	$defaultStub = $phar->createDefaultStub('fab.php');
	
	$stub = "#!/usr/bin/env php \n".$defaultStub;
	$phar->setStub($stub);
	$phar->stopBuffering();
	unset($phar);


function addFile($phar, $file)
{
	$content = file_get_contents($file);
	$phar->addFromString(basename($file), $content);
}
