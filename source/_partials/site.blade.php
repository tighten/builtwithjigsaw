<div class="flex m-2 shadow hover:shadow-md" style="width: 380px;">
    <div class="flex-1">
        <a href="{{ $site->url }}" class="block"><img src="{{ $site->image() }}" alt="Web site screenshot" class="border block"></a>
        <div class="text-sm py-4 px-6 bg-white">
            <a href="{{ $site->url }}" class="no-underline text-grey-darkest mb-1 block">{{ $site->title }}</a>
            <div class="mb-4 text-grey-dark">by {{ implode($site->authors, ', ') }}</div>
            <div class="mb-2">
                @foreach ($site->types as $type)
                <span class="bg-green text-xs text-white py-1 px-2 inline-block rounded mr-2" style="background: {{ $page->typeColors[$type] }}">{{ ucwords($type) }}</span>
                @endforeach
            </div>
        </div>
        <div class="bg-white flex text-sm border-t">
            <a href="{{ $site->url }}" class="p-4 flex-1 text-center p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit website</a>
            @if ($site->repo)
            <a href="{{ $site->repo }}" class="p-4 flex-1 text-center p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit repo</a>
            @endif
        </div>
    </div>
</div>
