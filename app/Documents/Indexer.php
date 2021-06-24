<?php

namespace App\Documents;

use Illuminate\Support\Str;
use App\Documents\Traits\HasPath;
use Symfony\Component\Finder\Finder;

class Indexer
{
    use HasPath;

    /**
     * Generate document links.
     *
     * @return array
     */
    public function generate(): array
    {
        $links = [];

        foreach ($this->scanForDirectories($this->docPath()) as $directory) {
            $files = [];

            foreach ($this->findFiles($directory->getRealPath()) as $file) {
                $files[Str::ucfirst(
                    $file->getFilenameWithoutExtension() === 'index'
                        ? 'Introduction'
                        : $file->getFilenameWithoutExtension()
                )] = [
                    'category' => $directory->getFilenameWithoutExtension(),
                    'page' => $file->getFilenameWithoutExtension(),
                ];
            }

            $links[$directory->getFilenameWithoutExtension()] = $files;
        }

        return $links;
    }

    public function scanForDirectories(string $location)
    {
        return $this->finder()->directories()->in($location);
    }

    /**
     * Find and list out all documentation files.
     *
     * @return \Symfony\Component\Finder\Finder
     */
    public function findFiles(string $directory): Finder
    {
        $finder = $this->finder()->files()->in($directory);

        return $finder->files()->name('*.md');
    }

    public function finder(): Finder
    {
        return new Finder();
    }
}
