<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Documents\Documentator;
use App\Contracts\Documents\Documentator as DocumentatorContract;

class DocumentatorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->instance('path.docs', __DIR__ . '/../Fixtures/docs');
    }

    public function testFindAndParseDocumentContent()
    {
        $manager = $this->getDocumentator();

        $this->assertEquals(
            "<h1>Scorch Authentication</h1>\n<p>Here is where we authentcate users.</p>\n",
            $manager->make('scorch/authentication')
        );
    }

    public function testReturnsEmptyStringIfDocumentDoesNotExist()
    {
        $manager = $this->getDocumentator();

        $this->assertEquals('', $manager->make('scorch/not-here'));
    }

    /**
     * Get the document manager instance.
     *
     * @return \App\Contracts\Documents\Documentator
     */
    public function getDocumentator(): DocumentatorContract
    {
        return $this->app->make(Documentator::class);
    }
}
