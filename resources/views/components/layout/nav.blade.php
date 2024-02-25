<nav class="flex sm:justify-center py-2 mt-20">
    
    @foreach ([['Home', '/dashboard'],
    ['Team', '/team'],
    ['Projects', '/projects'],
    ['Reports', '/reports'],] as $item)
    <a href={{$item[1]}}
        class="rounded-lg px-2 py-2 text-slate-700 font-medium hover:bg-slate-100 hover:text-slate-900">{{$item[0]}}</a>
    @endforeach



</nav>
