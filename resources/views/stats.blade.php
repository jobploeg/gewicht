<x-app-layout>
    <div class="py-12">
        <div class="sm:px-6 lg:px-8 md:w-2/3 sm:ml-56 w-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

                </div>
            </div>
        </div>
        <div class="sm:px-6 lg:px-8 md:w-2/3 sm:ml-56 w-screen md:mt-10 mt-11 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script>
                        const bmi = {!! json_encode($bmi) !!};
                    </script>

                    <canvas id="myChart1" height="100px"></canvas>


                    <script type="text/javascript">
                        const data1 = {
                            labels: date,
                            datasets: [
                                {
                                    label: 'BMI',
                                    backgroundColor: 'rgb(252, 202, 204)',
                                    borderColor: 'rgb(252, 202, 204)',
                                    data: bmi,
                                    tension: 0.2,
                                }
                            ]
                        };

                        const config1 = {
                            type: 'line',
                            data: data1,
                            options: {
                                scales: {
                                    'y': {
                                        suggestedMax: 27,
                                        suggestedMin: 18.5,
                                    }
                                }
                            }
                        };

                        const myChart1 = new Chart(
                            document.getElementById('myChart1'),
                            config1
                        );

                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

