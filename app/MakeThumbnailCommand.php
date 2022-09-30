<?php

namespace App;

use Illuminate\Contracts\Container\Container;
use InvalidArgumentException;
use Mni\FrontYAML\Parser;
use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;
use Symfony\Component\Console\Input\InputArgument;
use Throwable;
use TightenCo\Jigsaw\Console\Command;

class MakeThumbnailCommand extends Command
{
    protected static $defaultDescription = 'Generate a thumbnail of the given site.';

    public function __construct(
        private Container $app,
    ) {
        parent::__construct('make:thumbnail');
    }

    protected function configure()
    {
        $this->addArgument('site', InputArgument::REQUIRED, 'The site to generate a thumbnail for.');
    }

    protected function fire(): int
    {
        $site = $this->input->getArgument('site');

        try {
            $this->validate($site);

            $url = $this->url($site);

            $this->console->comment("Screenshotting {$url}");

            Browsershot::url($url)
                ->blockDomains(['googletagmanager.com', 'googlesyndication.com', 'doubleclick.net', 'google-analytics.com'])
                ->waitUntilNetworkIdle()
                ->windowSize(1280, 720)
                ->fit(Manipulations::FIT_CONTAIN, 380, 210)
                ->save(public_path("assets/images/sites/{$site}_auto.png"));
                // ->windowSize(1280, 720)
                // ->setScreenshotType('jpeg', 100)
                // ->save(public_path("assets/images/sites/{$site}_1280x720.jpeg"));

            $this->console->info("Thumbnail saved to _source/assets/images/sites/{$site}_auto.png");
        } catch (Throwable $e) {
            $this->console->error($e->getMessage());

            return static::FAILURE;
        }

        return static::SUCCESS;
    }

    protected function validate(string $site): void
    {
        if (! file_exists(public_path("_sites/{$site}.md"))) {
            throw new InvalidArgumentException("Site {$site} not found in _source/sites!");
        }
    }

    protected function url(string $site): string
    {
        return (new Parser)->parse(file_get_contents(public_path("_sites/{$site}.md")))->getYAML()['url'];
    }
}
