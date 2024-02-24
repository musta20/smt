<div class="rounded-sm border  border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default sm:px-7.5 xl:pb-1">

  <div class="flex flex-col ">
    <div class="grid  rounded-sm bg-gray-2 sm:grid-cols-3">
      <div class="p-2.5 xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">المنتج</h5>
      </div>
      <div class="p-2.5 text-center xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base"> عدد الطلبات</h5>
      </div>
      <div class="p-2.5 text-center xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">عدد المشاهدات</h5>
      </div>
    </div>
    @foreach ($product as $item)
    <div class="grid  border-b border-stroke sm:grid-cols-3">
      <div class="flex items-center gap-3 p-2.5 xl:p-5">

        <p class="hidden font-medium text-black sm:block">
          {{$item->name}}
        </p>
      </div>

      <div class="flex items-center justify-center p-2.5 xl:p-5">
        <p class="font-medium text-black">
          {{$item->order_count}}
        </p>
      </div>

      <div class="flex items-center justify-center p-2.5 xl:p-5">
        <p class="font-medium text-meta-3">
          {{$item->view_count}}

        </p>
      </div>

    </div>
    @endforeach


  </div>
</div>