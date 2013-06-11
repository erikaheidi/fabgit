<?php

$root = __DIR__.'/..';
$package_name = 'fabgit.phar';

	$phar = new Phar(__DIR__ . '/../' . $package_name, 0, 'fab');
	$phar->startBuffering();

	addFile($phar, $root.'/src/fab.php', 'src/fab.php');

	$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root.'/vendor', FilesystemIterator::SKIP_DOTS));
	foreach ($files as $file) {
		$filename = substr($file, strlen($root.'/'));
		addFile($phar, $file, $filename);
	}

	$defaultStub = $phar->createDefaultStub('src/fab.php');

	$stub = "#!/usr/bin/env php \n".$defaultStub;
	$phar->setStub($stub);
	$phar->stopBuffering();
	unset($phar);

function addFile($phar, $file, $filename)
{
	$content = file_get_contents($file);
	$phar->addFromString($filename, $content);
}
