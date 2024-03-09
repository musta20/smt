<x-main-layout :page="__('messages.Profile')" :SearchBox="true">

        <div x-ref='form' method="post" action="{{route('admin.profile.update')}}" class=" p-5">
            @method('put')
            @csrf
            <form method="post" action="{{ route('profile.update') }}" class="flex flex-col p-5 gap-9">
                @csrf
                @method('patch')            
                <div class="rounded-sm   p-5  border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            {{__('messages.User Profile')}}
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5 ">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                {{__('messages.Name')}}
                            </label>
                            <input type="text" multiple name="name" value="{{old('name',$user->name)}}"
                                class="border @error('name') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5 ">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                {{__('messages.last name')}}
                            </label>
                            <input type="text" name="last_name" value="{{old('last_name',$user->last_name)}}"
                                class="border w-full @error('last_name') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                {{__('messages.Email')}}
                            </label>
                            <input type="text" value="{{old('email',$user->email)}}" name="email"
                                class="border w-full @error('email') !border-red-500 @enderror  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="w-full xl:w-1/2 ">
                        </div>
                    </div>
                    <div class="rounded-sm  border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                {{__('messages.save')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Toggle switch input -->
            </form>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')            <!-- Textarea Fields -->
                <div class="rounded-sm  border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark  p-5 ">
                        <h3 class="font-medium text-black dark:text-white">
                            {{__('messages.Change password')}}
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5 ">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                {{__('messages.current password')}}
                            </label>
                            <input type="password" name="current_password"
                             placeholder="{{__('messages.current password')}}"
                                class="border @error('current_password') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                {{__('messages.new password')}}
                            </label>
                            <input type="password" name="password" placeholder="{{__('messages.new password')}}"
                                class="border @error('password') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5 xl:flex-row  p-5">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                {{__('messages.password confirmation')}}
                            </label>
                            <input type="password"
                             name="password_confirmation" 
                             placeholder="{{__('messages.password confirmation')}}"
                                class="border @error('password_confirmation') !border-red-500 @enderror  w-full rounded-lg  border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:!border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:!border-primary" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="rounded-sm  p-5  border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="flex justify-between border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                {{__('messages.save')}}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</x-main-layout>