<?php

namespace AbrarDev\InspireWidget;

class Image
{
    public function __construct(public readonly string $image, public readonly ?string $attribution = null) {}
}
