@extends('layouts.admin')


@section('content')

    <div class=" mb-10">

        <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 mb-6  bg-white">Solicitudes</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-blue-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-semibold text-2xl text-blueGray-600 mb-2">

                        <p>{{ $solicitudes->where('estado', 'nuevo')->count() }}</p>

                    </span>

                    <h5 class="text-blueGray-400 uppercase  text-center  tracking-widest md:tracking-normal">Nuevas</h5>

                </div>

                <a href="{{ route('solicitudes') . "?search=nuevo" }}" class="mx-auto rounded-full border border-blue-600 py-1 px-4 text-blue-500 hover:bg-blue-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-green-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-semibold text-2xl text-blueGray-600 mb-2">

                        <p>{{ $solicitudes->where('estado', 'aceptado')->count() }}</p>

                    </span>

                    <h5 class="text-blueGray-400 uppercase  text-center  tracking-widest md:tracking-normal">Aceptadas</h5>

                </div>

                <a href="{{ route('solicitudes') . "?search=aceptado" }}" class="mx-auto rounded-full border border-green-600 py-1 px-4 text-green-500 hover:bg-green-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-gray-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-semibold text-2xl text-blueGray-600 mb-2">

                        <p>{{ $solicitudes->where('estado', 'entregado')->count() }}</p>

                    </span>

                    <h5 class="text-blueGray-400 uppercase  text-center  tracking-widest md:tracking-normal">Entregadas</h5>

                </div>

                <a href="{{ route('solicitudes') . "?search=entregado" }}" class="mx-auto rounded-full border border-gray-600 py-1 px-4 text-gray-500 hover:bg-gray-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-red-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-semibold text-2xl text-blueGray-600 mb-2">

                        <p>{{ $solicitudes->where('estado', 'rechazado')->count() }}</p>

                    </span>

                    <h5 class="text-blueGray-400 uppercase  text-center  tracking-widest md:tracking-normal">Rechazadas</h5>

                </div>

                <a href="{{ route('solicitudes') . "?search=rechazado" }}" class="mx-auto rounded-full border border-red-600 py-1 px-4 text-red-500 hover:bg-red-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

        </div>

    </div>

    @if (auth()->user()->roles[0]->name == "Administrador" || auth()->user()->roles[0]->name == "Delegado(a) Administrativo" || auth()->user()->roles[0]->name == "Contador(a)" || auth()->user()->roles[0]->name == "Director")

        <div class="mb-10">

            <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 mb-6  bg-white">Gráfica de entradas</h2>

            <div class="bg-white rounded-lg p-2 shadow-lg">

                <canvas id="entriesChart" style="width: 100%; height: 400px;"></canvas>

            </div>

        </div>

        <div class="mb-10">

            <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 mb-6  bg-white">Artículos</h2>

            <div class="bg-white rounded-lg shadow-lg p-3">

                <p class="text-lg font-light text-gray-600 mb-2">Artículos con bajo Stock</p>

                <div class="grid grid-cols-5 gap-3 overflow-y-auto py-2">

                    @foreach ($articulos as $articulo)

                        <div class="flex space-x-2 col-span-1 text-sm">

                            <div class="">
                                @if($articulo->stock_total >= 20)
                                    <span class="bg-green-400 text-white rounded-full py-1 px-2">{{ $articulo->stock_total }}</span>
                                @elseif($articulo->stock_total <= 20 && $articulo->stock_total > 10)
                                    <span class="bg-yellow-400 text-white rounded-full py-1 px-2">{{ $articulo->stock_total }}</span>
                                @elseif($articulo->stock_total <= 10)
                                    <span class="bg-red-400 text-white rounded-full py-1 px-2">{{ $articulo->stock_total }}</span>
                                @endif
                            </div>

                            <p class="text-gray-600">{{ ucfirst($articulo->articulo->nombre) }}</p>

                        </div>


                    @endforeach

                </div>

            </div>

        </div>

    @endif

@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const colors = [
            ['#985F99', '#9684A1'],
            ['#595959', '#808F85'],
            ['#918868', '#CBD081'],
            ['#F7934C', '#CC5803'],
            ['#273043', '#9197AE'],
            ['#F02D3A', '#EFF6EE'],
            ['#000000', '#695B5C'],
            ['#4A5043', '#8AA1B1'],
            ['#A5B452', '#C8D96F'],
            ['#14591D', '#99AA38'],
            ['#003459', '#00A8E8'],
            ['#5C7457', '#C1BCAC'],
            ['#FF8360', '#E8E288'],
            ['#B96AC9', '#E980FC'],
            ['#63768D', '#8AC6D0'],
            ['#56445D', '#548687'],
            ['#8FBC94', '#C5E99B']
        ]

        const aux = {!! json_encode($data) !!}

        let dataArray = new Array();

        let aux2 = new Array();

        for(let key in aux){
            for (let key2 in aux[key]) {
                aux2.push(aux[key][key2])
            }

            var color = colors[Math.floor(Math.random()*colors.length)]

            dataArray.push(
                {
                    label: key,
                    data: aux2,
                    borderColor: color[0],
                    backgroundColor: color[1],
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 10
                }
            )

            aux2 = new Array();
        }

        const labels=  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        const data = {
            labels: labels,
            datasets:dataArray
        }

        const config = {
            type: 'line',
            data: data,
            options: {
                locale:'es-MX',
                responsive: true,
                scales:{
                    y:{
                        ticks:{
                            callback:(value, index, values) => {
                                return new Intl.NumberFormat('es-MX', {
                                    style: 'currency',
                                    currency: 'MXN',
                                }).format(value);
                            }
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Gráfica de entradas'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context){
                                return `${context.dataset.label}: $${context.formattedValue}`;
                            }
                        }
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('entriesChart'),
            config
        );

    </script>

@endpush




