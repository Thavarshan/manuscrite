<?php

namespace App\Documents;

use League\CommonMark\Environment;
use App\Contracts\Documents\Document;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;
use Emberfuse\Scorch\Support\Concerns\InteractsWithContainer;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

class Markdown implements Document
{
    use InteractsWithContainer;

    /**
     * The markdown parser environment instance.
     *
     * @var \League\CommonMark\ConfigurableEnvironmentInterface
     */
    protected $environment;

    /**
     * Create new markdown parser instance.
     *
     * @param \League\CommonMark\ConfigurableEnvironmentInterface|null $environment
     *
     * @return void
     */
    public function __construct(?ConfigurableEnvironmentInterface $environment = null)
    {
        if (is_null($environment)) {
            $environment = $this->createEnvironment();
        }

        $this->environment = $environment;
    }

    /**
     * Find and retrieve the localized Markdown resource.
     *
     * @param string $name
     *
     * @return string|null
     */
    public function get(string $name): ?string
    {
        return (new CommonMarkConverter([], $this->environment))
            ->convertToHtml(file_get_contents($name));
    }

    /**
     * Create parser environment.
     *
     * @return \League\CommonMark\ConfigurableEnvironmentInterface
     */
    protected function createEnvironment(): ConfigurableEnvironmentInterface
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension($this->createDefaultExtension());

        return $environment;
    }

    /**
     * Create an environment extension to be used for the parser.
     *
     * @return \League\CommonMark\Extension\ExtensionInterface
     */
    protected function createDefaultExtension(): ExtensionInterface
    {
        return $this->resolve(GithubFlavoredMarkdownExtension::class);
    }
}
