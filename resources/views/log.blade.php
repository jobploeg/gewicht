<x-app-layout>
    {{--    LOG WEIGHT--}}
    <div class="py-12 sm:flex sm:flex-row">
        <div class="mx-auto sm:px-6 lg:px-8 md:w-1/4 w-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/log">
                        @csrf

                        <div>
                            <header class="max-w-lg mx-auto mb-3">
                                <h1 class="text-xl font-bold text-black text-center">Gewicht toevoegen</h1>
                            </header>
                        </div>

                        <div>
                            <x-input id="gewicht" class="block mt-1 w-full" type="number" step="0.01" name="gewicht"
                                     :value="old('gewicht')" autofocus/>
                        </div>

                        <x-button class="mt-6">
                            {{ __('Toevoegen') }}
                        </x-button>
                    </form>
                </div>
            </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-11">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <header class="max-w-lg mx-auto mb-3">
                                <h1 class="text-xl font-bold text-black text-center">Profiel beheren</h1>
                            </header>
                        </div>
                        <x-button class="mx-5">
                            <a href="/profile">
                                {{'Profiel beheren'}}
                            </a>
                        </x-button>
                    </div>
                </div>
        </div>

        {{--    WEIGHT--}}
        <div class="mx-auto sm:px-6 lg:px-8 md:w-2/4 w-screen mt-20 md:mt-0">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Gewicht</th>
                            <th scope="col" class="px-6 py-3">BMI</th>
                            <th scope="col" class="px-6 py-3">Datum</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $log)
                            <tr class="border-b hover:bg-indigo-200 odd:bg-white even:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $log->gewicht }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $log->bmi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $log->created_at->format('m/d/Y') }}
                                </td>
                                {{--                                <td>--}}
                                {{--                                    <form action="{{route('logs.destroy',$log->id)}}" method="post" class="d-inline">--}}
                                {{--                                        {{ csrf_field() }}--}}
                                {{--                                        @method('DELETE')--}}
                                {{--                                        <button class="hover:underline m-1" style="font-weight: bold" type="submit">--}}
                                {{--                                            <i class="material-icons text-gray-500">delete</i>--}}
                                {{--                                        </button>--}}
                                {{--                                    </form>--}}
                                {{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


{{--    STATS--}}
    <div class="mx-auto sm:px-6 lg:px-8 flex items-start sm:w-3/4 sm:mt-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-screen">
            <div class="p-6 bg-white border-b border-gray-200">
                <script>
                    const gewicht = {!! json_encode($gewicht) !!};
                    const date = {!! json_encode($dates) !!};
                </script>

                <canvas id="myChart" height="100px"></canvas>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                <script type="text/javascript">
                    const data = {
                        labels: date,
                        datasets: [
                            {
                                label: 'gewicht',
                                backgroundColor: 'rgb(201, 210, 253)',
                                borderColor: 'rgb(201, 210, 253)',
                                data: gewicht,
                                tension: 0.2,
                            }
                        ]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                'y': {
                                    suggestedMin: 70,
                                }
                            }
                        }
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );

                </script>

                <x-button class="mt-11">
                    <a href="/stats">
                        {{'Meer'}}
                    </a>
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
