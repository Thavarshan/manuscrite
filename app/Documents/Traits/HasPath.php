<?php

namespace App\Documents\Traits;

use Emberfuse\Scorch\Support\Concerns\InteractsWithContainer;

trait HasPath
{
    use InteractsWithContainer;

    /**
     * Get the path to the resources directory.
     *
     * @param string $path
     *
     * @return string
     */
    public function docPath(string $path = ''): string
    {
        return $this->resolve('path.docs') . ($path ? \DIRECTORY_SEPARATOR . $path : $path);
    }
}
