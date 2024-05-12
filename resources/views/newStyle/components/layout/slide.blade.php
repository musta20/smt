@props([ 'CarouselImage'])

<div class="carousel relative container mx-auto" style="max-width:1600px;">
    <div class="carousel-inner relative overflow-hidden w-full">
        <!--Slide 1-->

        @foreach ($CarouselImage as $key=>$item)
            
        <input class="carousel-open" type="radio" id="carousel-{{$loop->index}}" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item absolute opacity-0" style="height:50vh;">
            <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" 
            style="background-image: url('{{tenant_asset('media/'.$key)}}');">

           

            </div>
        </div>
        
        {{-- <label for="carousel-{{$loop->index+1}}" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-{{$loop->index-1}}" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> --}}

        @endforeach

      
        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">


            @foreach ($CarouselImage as $key=>$item)
            <li class="inline-block mr-3">
                <label for="carousel-{{$loop->index}}" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
            </li>
            @endforeach


        

        </ol>

    </div>
</div>