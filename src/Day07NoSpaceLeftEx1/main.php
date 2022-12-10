<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx1;

require __DIR__ . '/../../vendor/autoload.php';

$fileTree = FileTreeLoader::execute(input::$commandSequence);

echo LightDirectoryFinder::execute($fileTree). "\r\n";

