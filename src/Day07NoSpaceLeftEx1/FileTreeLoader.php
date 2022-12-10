<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx1;

class FileTreeLoader
{
    public static function execute(array $commandSequence): FileNode
    {
        
        $fileTree = new FileNode(name: '/', size: 0);
        self::load($fileTree, array_slice($commandSequence, 1));

        return $fileTree;
    }

    private static function load(FileNode $fileTree, array $commandSequence): void
    {
        $currentDir = $fileTree->root();

        foreach ($commandSequence as $command) {
            switch (substr($command, 0, 4)) {
            case '$ ls':
                break;
            case '$ cd':
                $currentDir = self::changeDir($currentDir, $command);
                    break;
            default:
                self::addContent($currentDir, $command);
                break;
            }
        }
    }

    private static function addContent(FileNode $currentDir, string $message): void
    {
        $parts = explode(' ', $message);

        if ($parts[0] == 'dir') {
            $currentDir->addChild(new FileNode($parts[1], 0));
        } else {
            $currentDir->addChild(new FileNode($parts[1], (int)$parts[0]));
        }
    }

    private static function changeDir(FileNode $currentDir, string $command): FileNode
    {
        if ($command == '$ cd ..') {
            return $currentDir->getParent();
        }

        $destination = substr($command, 5);

        foreach ($currentDir->getChildren() as $child) {
            if ($child->getName() == $destination) {
                return $child;
            }
        }
    }
}
