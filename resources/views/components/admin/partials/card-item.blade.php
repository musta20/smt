<div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
<div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2">
    {{ $slot }}
</div>

<div class="mt-4 flex items-end justify-between">
    <div class="flex w-full justify-between" >
        <span class="text-sm font-medium">{{ $title }}</span>

        <h4 class="text-title-md font-bold text-black">
            {{ $number }}
        </h4>
    </div>

    <span  class="hidden flex items-center gap-1 text-sm font-medium text-meta-3">
        0.43%
        <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z"
                fill="" />
        </svg>
    </span>
</div>
</div>