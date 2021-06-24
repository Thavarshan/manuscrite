<?php

namespace App\Documents;

use Illuminate\Support\Arr;
use App\Contracts\Documents\Document;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;
use Emberfuse\Scorch\Support\Concerns\InteractsWithContainer;
use App\Contracts\Documents\Documentator as DocumentatorContract;

class Documentator implements DocumentatorContract
{
    use InteractsWithContainer;

    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The cache implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * The default document reader instance.
     *
     * @var \App\Contracts\Documents\Document
     */
    protected $document;

    /**
     * The default document type reader instance.
     *
     * @param \Illuminate\Filesystem\Filesystem      $files
     * @param \Illuminate\Contracts\Cache\Repository $cache
     * @param \App\Contracts\Documents\Document      $document
     *
     * @return void
     */
    public function __construct(Filesystem $files, Cache $cache, Document $document)
    {
        $this->files = $files;
        $this->cache = $cache;
        $this->document = $document;
    }

    /**
     * Find and parse the document content.
     *
     * @param string $document
     *
     * @return string
     */
    public function make(string $document): string
    {
        return $this->cache->remember(
            $this->normalizeName($document),
            5,
            function () use ($document) {
                if ($content = $this->find($document)) {
                    return $this->document->get($content);
                }

                return '';
            }
        );
    }

    /**
     * Attempt to find the reuqested document.
     *
     * @param string $document
     *
     * @return string|null
     */
    public function find(string $document): ?string
    {
        return Arr::first([
            $this->docPath($this->getLocalName($document)),
            $this->docPath($document),
        ], function (string $path): bool {
            return $this->files->exists($path);
        });
    }

    /**
     * Fomat the document path and file name to be used as index.
     *
     * @param string $name
     *
     * @return string
     */
    protected function normalizeName(string $name): string
    {
        return "docs.{$name}";
    }

    /**
     * Get the name of the file in default locale.
     *
     * @param string $name
     *
     * @return string
     */
    public function getLocalName(string $name): string
    {
        return preg_replace(
            '#(\.md)$#i',
            '.' . $this->resolve()->getLocale() . '$1',
            $name
        );
    }

    /**
     * Get the path to the resources directory.
     *
     * @param string $path
     *
     * @return string
     */
    public function docPath(string $path = ''): string
    {
        return $this->resolve('path.docs') . ($path ? \DIRECTORY_SEPARATOR . $path : $path) . '.md';
    }
}
