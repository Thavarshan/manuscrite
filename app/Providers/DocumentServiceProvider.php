<?php

namespace App\Providers;

use App\Documents\Markdown;
use App\Documents\Documentator;
use App\Contracts\Documents\Document;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Documents\Documentator as DocumentatorContract;

class DocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDocPath();
        $this->registerDocumentManager();
        $this->registerDocumentReader();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the default path where all documentation files are located.
     *
     * @return void
     */
    protected function registerDocPath(): void
    {
        $this->app->instance('path.docs', config('docs.path'));
    }

    /**
     * Register documente manager instance.
     *
     * @return void
     */
    public function registerDocumentManager(): void
    {
        $this->app->singleton(DocumentatorContract::class, Documentator::class);
    }

    /**
     * Register document reader instance.
     *
     * @return void
     */
    public function registerDocumentReader(): void
    {
        $this->app->singleton(Document::class, Markdown::class);
    }
}
