@props(['categoryLink'])
<div class="w-full py-3 flex justify-center">
    @if ($visible->showHeadrLinks && $categoryLink)
    <ul class="flex gap-3 border-black">
        @foreach ($categoryLink as $item)
        <li>
            <a href={{route('categoryPage',$item->id)}} class="p-1 border-b-2 hover:border-secondary"
                >{{$item->name}}</a>
        </li>
        @endforeach
    </ul>
    @endif
</div>