<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx2;

require __DIR__ . '/../../vendor/autoload.php';

$fileTree = FileTreeLoader::execute(input::$commandSequence);

echo LargeDirectoryFinder::execute($fileTree). "\r\n";

