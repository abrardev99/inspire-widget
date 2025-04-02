<?php

namespace AbrarDev\InspireWidget;

use Filament\Contracts\Plugin;
use Filament\Panel;

class InspireWidgetPlugin implements Plugin
{
    protected array $quotes = [];
    protected string $imagePath = '';

    public function getId(): string
    {
        return 'inspire-widget';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function quotes(array $quotes): static
    {
        $this->quotes = $quotes;

        return $this;
    }

    public function getQuotes(): array
    {
        return $this->quotes;
    }

    public function imagePath(string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }
}
