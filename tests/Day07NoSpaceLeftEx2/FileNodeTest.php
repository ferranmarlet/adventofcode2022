<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day07NoSpaceLeftEx2\FileTreeLoader;
use PHPUnit\Framework\TestCase;

class FileNodeTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_total_weight_for_a_single_file(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            '123 file_a',
        ];

        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(123, $fileTree->getFileTreeTotalWeight());
    }

    /**
    * @test
    */
    public function should_return_total_weight_for_multiple_files(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            '100 file_a',
            '250 file_b',
        ];

        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(350, $fileTree->getFileTreeTotalWeight());
    }

    /** 
    * @test
    */
    public function should_return_total_weight_for_multiple_subdirs(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            '100 file_a',
            '250 file_b',
            'dir c',
            '$ cd c',
            '$ ls',
            '75 file_c',
        ];

        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(100 + 250 + 75, $fileTree->getFileTreeTotalWeight());
    }

}
