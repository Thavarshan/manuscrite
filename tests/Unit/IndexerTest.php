<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Documents\Indexer;

class IndexerTest extends TestCase
{
    public function testGenerateLinkIndex()
    {
        $indexer = new Indexer();

        $this->assertEquals([
            'blaze' => [
                'Installation' => [
                    'category' => 'blaze',
                    'page' => 'installation',
                ],
            ],
            'scorch' => [
                'Authentication' => [
                    'category' => 'scorch',
                    'page' => 'authentication',
                ],
                'Introduction' => [
                    'category' => 'scorch',
                    'page' => 'index',
                ],
            ],
          ], $indexer->generate());
    }
}
