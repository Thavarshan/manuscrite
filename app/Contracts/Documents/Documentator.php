<?php

namespace App\Contracts\Documents;

interface Documentator
{
    /**
     * Find and parse the document content.
     *
     * @param string $document
     *
     * @return string
     */
    public function make(string $document): string;

    /**
     * Attempt to find the reuqested document.
     *
     * @param string $document
     *
     * @return string|null
     */
    public function find(string $document): ?string;

    /**
     * Get the name of the file in default locale.
     *
     * @param string $name
     *
     * @return string
     */
    public function getLocalName(string $name): string;

    /**
     * Get the path to the resources directory.
     *
     * @param string $path
     *
     * @return string
     */
    public function docPath(string $path = ''): string;
}
