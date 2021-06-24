<?php

namespace Tests\Feature\Docs;

use Tests\TestCase;
use Inertia\Testing\Assert;
use App\Contracts\Documents\Documentator as DocumentatorContract;

class ReadDocumentationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->instance('path.docs', __DIR__ . '/../../Fixtures/docs');
    }

    public function testReadDocument()
    {
        $response = $this->get('/docs/scorch/authentication');

        $response->assertStatus(200);
    }

    public function testDocumentContentAvailable()
    {
        $response = $this->get('/docs/scorch/authentication');

        $response->assertStatus(200);

        $content = $this->getDocumentator()->make('scorch/authentication');

        $response->assertInertia(function (Assert $inertia) use ($content) {
            return $inertia->has('content') && $inertia->where('content', $content);
        });
    }

    public function testDocumentNotFound()
    {
        $response = $this->get('/docs/scorch/not-here');

        $response->assertStatus(404);
    }

    /**
     * Get the document manager instance.
     *
     * @return \App\Contracts\Documents\Documentator
     */
    public function getDocumentator(): DocumentatorContract
    {
        return $this->app->make(DocumentatorContract::class);
    }
}
