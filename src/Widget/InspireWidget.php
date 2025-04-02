<?php

namespace AbrarDev\InspireWidget\Widget;

use AbrarDev\InspireWidget\Image;
use AbrarDev\InspireWidget\InspireWidgetPlugin;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Artisan;

class InspireWidget extends Widget
{
    protected static ?int $sort = -10;

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'inspire-widget::filament.widget.inspire-widget';

    public function inspire(): string
    {
        if (count(InspireWidgetPlugin::get()->getQuotes()) > 0) {
            $quotes = InspireWidgetPlugin::get()->getQuotes();

            return $quotes[array_rand($quotes)];
        }

        Artisan::call('inspire');

        return Artisan::output();
    }

    public function image(): Image
    {
        return InspireWidgetPlugin::get()->getImage();
    }
}
