<div class="flex m-2 shadow hover:shadow-md" style="width: 380px;">
    <div class="flex-1">
        <a href="{{ $site->url }}"><img src="http://via.placeholder.com/380x210"></a>
        <div class="middle-thingy text-sm py-4 px-6 bg-white">
            <a href="{{ $site->url }}" class="font-bold no-underline text-grey-darkest">{{ $site->title }}</a>
            <div class="mb-4">by {{ implode($site->authors, ', ') }}</div>
            {{--@todo make it a foreach:--}}
            <div class="mb-4">
                <span class="bg-green text-xs text-white p-2 font-bold rounded">{{ ucwords($site->type) }}</span>
            </div>
        </div>
        <div class="bottom-thingy bg-white flex text-sm font-bold border-t">
            <a href="{{ $site->url }}" class="p-4 flex-1 text-center display-block p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit website</a>
            @if ($site->repo)
            <a href="{{ $site->repo }}" class="p-4 flex-1 text-center display-block p-4 no-underline text-blue hover:bg-blue hover:text-white">{{--[icon]--}} Visit repo</a>
            @endif
        </div>
    </div>
</div>
