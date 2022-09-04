<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-4 sm:flex sm:flex-row">
                        <div class="md:w-1/2 w-screen mt-2 m-2 w-80">
                            <div class="font-large text-lg text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-large text-md text-gray-500 mb-10">{{ Auth::user()->email }}</div>
                            @if(Auth::user()->image)
                                <img class="sm:w-1/2 sm:h-2/2 rounded" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="Rounded avatar">
                            @endif
                        </div>
                        <div class="md:w-1/2 w-screen mt-10">
                            <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="website-admin"
                                       class="block mb-2 text-md font-large text-gray-900 dark:text-gray-300 font-bold">Verander lengte</label>
                                <div class="flex sm:w-52 w-80">
                                    <input type="text" name="lengte"
                                           class="rounded-none rounded-l-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->lengte}}">
                                    <span
                                        class="inline-flex items-center px-3 text-sm  text-gray-900 bg-gray-200 rounded-r-md border border-l-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        CM
                                    </span>
                                </div>
                                <div class="mt-5">
                                    <label for="website-admin"
                                           class="block mb-2 text-md font-large text-gray-900 dark:text-gray-300 font-bold">Verander profielfoto</label>
                                    <input type="file" name="image" class="rounded-sm">
                                    <div class="mt-10">
                                        <x-button>
                                          <input type="submit" value="Update">
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
