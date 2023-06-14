<x-filament::widget id="overlook-widget" @class(['hidden' => ! $data])>
    @if($data)
        <x-filament-support::grid
            :default="config('overlook.grid.default')"
            :sm="config('overlook.grid.sm')"
            :md="config('overlook.grid.md')"
            :lg="config('overlook.grid.lg')"
            :xl="config('overlook.grid.xl')"
            class="gap-6"
        >
            @foreach ($data as $resource)
                <x-filament-support::grid.column>
                    <div
                        class="rounded-xl border border-gray-200 dark:border-gray-800 relative h-24 bg-gradient-to-tr from-gray-100 via-white to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-800"
                        wire:key="{{ $resource['name'] }}"
                        @if($this->shouldShowTooltip($resource['raw_count']))
                            x-data x-tooltip="'{{ $resource['raw_count'] }}'"
                        @endif
                    >
                        <a href="{{ $resource['url'] }}" class="overflow-hidden absolute inset-0 py-2 px-3 text-gray-600 font-medium rounded-xl ring-primary-500 dark:text-gray-400 group hover:ring-2 focus:ring-2">
                            @if ($resource['icon'])
                                <x-dynamic-component :component="$resource['icon']" class="w-auto h-24 absolute left-0 top-8 text-primary-500 opacity-20 dark:opacity-20 transition group-hover:scale-110 group-hover:-rotate-12 group-hover:opacity-40 dark:group-hover:opacity-80" />
                            @endif
                            {{ $resource['name'] }}
                            <span class="text-gray-600 dark:text-gray-300 absolute leading-none bottom-3 right-4 text-3xl font-bold">{{ $resource['count'] }}</span>
                        </a>
                    </div>
                </x-filament-support::grid.column>
            @endforeach
        </x-filament-support::grid>
    @else
        <div class="-my-8"></div>
    @endif
</x-filament::widget>

