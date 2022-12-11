<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day07NoSpaceLeftEx2\FileTreeLoader;
use Kata\Day07NoSpaceLeftEx2\LargeDirectoryFinder;
use PHPUnit\Framework\TestCase;

class LargeDirectoryFinderTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_root_for_no_subdirs(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            LargeDirectoryFinder::TOTAL_DISK_SPACE - 1 . ' large_file',
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);

        self::assertEquals(
            LargeDirectoryFinder::TOTAL_DISK_SPACE - 1,
            LargeDirectoryFinder::execute($fileTree)
        );
    }

    /**
    * @test
    */
    public function should_return_directory_other_than_root_if_big_enough(): void
    {
        $largeFileSize = '40000000';
        $additionalFileSize = '1000';

        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir some_dir',
            '10 small_file',
            '$ cd some_dir',
            '$ ls',
            'dir large_dir',
            '10 small_file2',
            '$ cd large_dir',
            '$ ls',
            "$largeFileSize large_file",
            "$additionalFileSize additional_file",
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);

        self::assertEquals(
            $largeFileSize + $additionalFileSize,
            LargeDirectoryFinder::execute($fileTree)
        );
    }

    /**
    * @test
    */
    public function should_return_smallest_dir_to_free_enough_space(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir a',
            '14848514 b.txt',
            '8504156 c.dat',
            'dir d',
            '$ cd a',
            '$ ls',
            'dir e',
            '29116 f',
            '2557 g',
            '62596 h.lst',
            '$ cd e',
            '$ ls',
            '584 i',
            '$ cd ..',
            '$ cd ..',
            '$ cd d',
            '$ ls',
            '4060174 j',
            '8033020 d.log',
            '5626152 d.ext',
            '7214296 k'
        ];

        $fileTree = FileTreeLoader::execute($commandSequence);

        self::assertEquals(
            '24933642',
            LargeDirectoryFinder::execute($fileTree)
        );
    }
}
