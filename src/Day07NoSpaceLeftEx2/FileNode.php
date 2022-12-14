<?php

declare(strict_types=1);

namespace Kata\Day07NoSpaceLeftEx2;

use Tree\Node\Node;

class FileNode extends Node
{
    private string $name;
    private int $size;

    public function __construct(string $name, int $size)
    {
        $this->name = $name;
        $this->size = $size;
        parent::__construct();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function toString(): string
    {
        $result = $this->getName();

        foreach ($this->getChildren() as $child) {
            $result .= "\n  " . $child->toString();
        }

        return $result;
    }

    /** 
     * @return FileNode[]
     */
    public function getChildren(): array
    {
        return parent::getChildren();
    }

    public function root(): FileNode
    {
        return parent::root();
    }

    public function isFile(): bool
    {
        return $this->size != 0;
    }

    public function isDirectory(): bool
    {
        return $this->getSize() == 0;
    }

    public function getFileTreeTotalWeight(): int
    {
        $totalDirectorySize = 0;

        foreach ($this->getChildren() as $child) {
            if ($child->isFile()) {
                $totalDirectorySize += $child->getSize();
            } else {
                $totalDirectorySize += $child->getFileTreeTotalWeight();
            }
        }

        return $totalDirectorySize;
    }

}
