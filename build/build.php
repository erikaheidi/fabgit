<?php

$package_name = 'fabgit.phar';


	$phar = new Phar(__DIR__ . '/../' . $package_name, 0, 'fab');
	$phar->startBuffering();

	addFile($phar, __DIR__  . '/../src/fab.php');
	addFile($phar, __DIR__  . '/../src/vendor/whatthejeff/fab/src/Fab/Fab.php');
	addFile($phar, __DIR__  . '/../src/vendor/whatthejeff/fab/src/Fab/SuperFab.php');
	addFile($phar, __DIR__  . '/../src/vendor/whatthejeff/fab/src/Fab/Factory.php');

	$defaultStub = $phar->createDefaultStub('fab.php');
	
	$stub = "#!/usr/bin/env php \n".$defaultStub;
	$phar->setStub($stub);
	$phar->stopBuffering();
	unset($phar);
	//$phar["fab.php"] = file_get_contents($srcRoot . "/fab.php");
	//$phar->buildFromDirectory($root_folder);
	/*
	$phar["Fab.php"] = file_get_contents($srcRoot . "/vendor/whatthejeff/fab/src/Fab.php");
	$phar["SuperFab.php"] = file_get_contents($srcRoot . "/vendor/whatthejeff/fab/src/SuperFab.php");
	$phar["Factory.php"] = file_get_contents($srcRoot . "/vendor/whatthejeff/fab/src/Fab.php");
	
	//$phar["common.php"] = file_get_contents($srcRoot . "/common.php");*/


function addFile($phar, $file)
{
	$content = file_get_contents($file);
	$phar->addFromString(basename($file), $content);
}
