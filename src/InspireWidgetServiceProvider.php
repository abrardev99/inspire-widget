<?php

namespace AbrarDev\InspireWidget;

use AbrarDev\InspireWidget\Testing\TestsInspireWidget;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class InspireWidgetServiceProvider extends PackageServiceProvider
{
    public static string $name = 'inspire-widget';

    public static string $viewNamespace = 'inspire-widget';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishAssets()
                    ->askToStarRepoOnGitHub('abrardev/inspire-widget');
            });

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        if (app()->runningInConsole()) {
            // publish images
            $this->app->make(Filesystem::class)->ensureDirectoryExists(public_path('vendor/inspire-widget/images'));
            $this->app->make(Filesystem::class)->copyDirectory(
                __DIR__ . '/../resources/images',
                public_path('vendor/inspire-widget/images')
            );
        }

        // Testing
        Testable::mixin(new TestsInspireWidget);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'abrardev/inspire-widget';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('inspire-widget-styles', __DIR__ . '/../resources/dist/inspire-widget.css'),
            Js::make('inspire-widget-scripts', __DIR__ . '/../resources/dist/inspire-widget.js'),
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }
}
