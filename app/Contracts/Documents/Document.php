<?php

namespace App\Contracts\Documents;

interface Document
{
    /**
     * Find and retrieve the localized Markdown resource.
     *
     * @param string $name
     *
     * @return string|null
     */
    public function get(string $name): ?string;
}
