<x-filament-widgets::widget>
    <div class="relative">
        <img src="{{ $this->image()->image }}"
             alt="Inspiration Image"
             attribution="{{ $this->image()->attribution }}"
             class="w-full h-full object-cover rounded-lg">
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-white text-center font-bold">{{ $this->inspire() }}</span>
        </div>
    </div>
</x-filament-widgets::widget>
