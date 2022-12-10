<?php

declare(strict_types=1);

namespace Tests;

use Kata\Day07NoSpaceLeftEx1\FileTreeLoader;
use Kata\Day07NoSpaceLeftEx1\LightDirectoryFinder;
use PHPUnit\Framework\TestCase;

class LightDirectoryFinderTest extends TestCase
{
    /**
    * @test
    */
    public function should_return_zero_for_no_light_directories(): void
    {
        $commandSequence = [
            '$ cd /',
            '$ ls',
            LightDirectoryFinder::LIGHT_FOLDERS_WEIGHT_LIMIT + 1 . ' a',
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);

        self::assertEquals(0, LightDirectoryFinder::execute($fileTree));
    }

    /**
    * @test
    */
    public function should_return_weight_of_one_light_directory(): void
    {
        $weightOfLightFile = 10;
        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir a',
            '$ cd a',
            '$ ls',
            "$weightOfLightFile b",
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals($weightOfLightFile, LightDirectoryFinder::execute($fileTree));
    }

    /**
    * @test
    */
    public function should_add_up_weight_of_recursive_light_directories(): void
    {
        
        $weightOfLightFile = 10;
        $weightOfLightFile2 = 11;
        $commandSequence = [
            '$ cd /',
            '$ ls',
            'dir a',
            '$ cd a',
            '$ ls',
            "$weightOfLightFile b",
            'dir c',
            '$ cd c',
            '$ ls',
            "$weightOfLightFile2 d",
        ];
        $fileTree = FileTreeLoader::execute($commandSequence);
        self::assertEquals($weightOfLightFile + $weightOfLightFile2 * 2, LightDirectoryFinder::execute($fileTree));
    }

    /**
    * @test
    */
    public function should_return_accumulated_weight_of_complex_file_tree(): void
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
        self::assertEquals(95437, LightDirectoryFinder::execute($fileTree));
    }

}
