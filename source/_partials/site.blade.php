<div x-show="[...@js($site->types), 'all'].includes(type)" class="shadow-sm hover:shadow-md rounded-sm transition overflow-hidden">
    <a href="{{ $site->url }}" class="block w-full">
        <img
            class="lazy block w-full border"
            {{-- Lazyload all images *except* the first two rows --}}
            {{ $loop->index <= 5 ? '' : 'data-' }}src="{{ $site->image() }}"
            alt="Website screenshot"
        />
    </a>

    <div class="px-6 py-4 text-sm bg-white">
        <a href="{{ $site->url }}" class="block text-gray-800">
            {{ $site->title }}
        </a>

        <div class="mt-1 text-gray-600">by {{ implode(', ', $site->authors) }}</div>

        <div class="flex flex-wrap gap-2 mt-4 mb-2">
            @foreach ($site->types as $type)
                <button
                    x-on:click="type = @js($type)"
                    style="background: {{ $page->typeColors[$type] ?? '' }};"
                    class="px-2 py-1 text-xs text-white rounded-sm"
                    type="button"
                >
                    {{ \Illuminate\Support\Str::title($type) }}
                </button>
            @endforeach
        </div>
    </div>
    <div class="flex text-sm border-t bg-white">
        <a
            href="{{ $site->url }}"
            class="flex items-center justify-center flex-1 p-4 text-sky-600 hover:bg-sky-600 hover:text-white transition"
        >
            <svg width="12px" height="12px" class="mr-2"><use xlink:href="#icon-visit-website"/></svg>
            Visit website
        </a>

        @if ($site->repo)
            <a
                href="{{ $site->repo }}"
                class="flex items-center justify-center flex-1 p-4 text-sky-600 hover:bg-sky-600 hover:text-white transition"
            >
                <svg width="12px" height="12px" class="mr-2"><use xlink:href="#icon-visit-repo"/></svg>
                Visit repo
            </a>
        @endif
    </div>
</div>
