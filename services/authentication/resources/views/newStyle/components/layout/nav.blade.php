@props(['categoryLink'])
<nav class="flex sm:justify-center py-1">
    @if ($visible->showHeadrLinks && $categoryLink)

    @foreach ($categoryLink as $item)
    <a href={{ route('categoryPage',$item->id) }}
        class="rounded-lg px-2 py-2 text-slate-700 font-medium hover:bg-gray-100">{{ $item->name }}</a>
    @endforeach

    @endif

</nav>
