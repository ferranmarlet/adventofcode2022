<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day07NoSpaceLeftEx1\FileTreeLoader;
use PHPUnit\Framework\TestCase;

class FileTreeLoaderTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_root_only_when_no_commands(): void
    {
        $commandSequence = [];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEmpty($fileTree->root()->getChildren());
    }

    /**
    * @test
    */
    public function should_create_file_at_root_folder(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            '10 file_a',
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        $child = $fileTree->getChildren()[0];
        self::assertEquals(10, $child->getSize());
    }

    /**
    * @test
    */
    public function should_create_multiple_files_at_root_folder(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            '10 file_a',
            '30 file_b',
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(10, $fileTree->getChildren()[0]->getSize());
        self::assertEquals(30, $fileTree->getChildren()[1]->getSize());
    }

    /**
    * @test
    */
    public function should_create_multiple_files_in_folder_other_than_root(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir a',
            '$ cd a',
            '$ ls',
            '10 b'
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(
            10,
            $fileTree->root()->getChildren()[0]->getChildren()[0]->getSize()
        );
    }

    /**
    * @test
    */
    public function should_allow_change_dir_to_parent(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir a',
            'dir b',
            '$ cd a',
            '$ ls',
            '10 c',
            '$ cd ..',
            '$ cd b',
            '$ ls',
            '20 d',
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals(
            10,
            $fileTree->root()->getChildren()[0]->getChildren()[0]->getSize()
        );
        self::assertEquals(
            20,
            $fileTree->root()->getChildren()[1]->getChildren()[0]->getSize()
        );
    }
}
