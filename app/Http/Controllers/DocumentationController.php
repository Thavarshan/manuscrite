<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Contracts\Documents\Documentator;

class DocumentationController extends Controller
{
    /**
     * The documents manager instance.
     *
     * @var \App\Contracts\Documents\Documentator
     */
    protected $documents;

    /**
     * Create new instance of Documentation controller,.
     *
     * @param \App\Contracts\Documents\Documentator $documents
     *
     * @return void
     */
    public function __construct(Documentator $documents)
    {
        $this->documents = $documents;
    }

    /**
     * Display the specified resource.
     *
     * @param string      $category
     * @param string|null $page
     *
     * @return \Inertia\Response
     */
    public function __invoke(string $category, ?string $page = null)
    {
        $content = $this->documents->make(
            $this->normalizeName($category, $page)
        );

        abort_unless(filled($content), 404);

        return Inertia::render('Docs/Show', compact('content'));
    }

    /**
     * Normalize URI format into document path and name.
     *
     * @param string      $category
     * @param string|null $page
     *
     * @return string
     */
    protected function normalizeName(string $category, ?string $page = null): string
    {
        return $category . \DIRECTORY_SEPARATOR . ($page ? $page : 'index');
    }
}
