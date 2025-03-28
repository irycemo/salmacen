<div>

    <div class="md:flex md:flex-row flex-col md:space-x-4 items-center justify-center gap-3 bg-white rounded-xl mb-5 p-4">

        <x-input-group for="fecha1" label="Fecha inicial" :error="$errors->first('fecha1')" >

            <x-input-text type="date" id="fecha1" wire:model.live="fecha1" />

        </x-input-group>

        <x-input-group for="fecha2" label="Fecha final" :error="$errors->first('fecha2')" >

            <x-input-text type="date" id="fecha2" wire:model.live="fecha2" />

        </x-input-group>

    </div>

    <div class="md:flex flex-col md:flex-row justify-center md:space-x-3 items-center bg-white rounded-xl mb-5 p-4">

        <x-input-group for="articulo" label="Artículos" :error="$errors->first('articulo')" class="w-fit">

            <x-input-select id="articulo" wire:model.live="articulo">

                <option value="" selected>Seleccione una opción</option>

                @foreach ($articulos as $articulo)

                    <option value="{{ $articulo->id }}" selected>{{ $articulo->nombre }}</option>

                @endforeach

            </x-input-select>

        </x-input-group>

        <x-input-group for="usuario" label="Usuarios" :error="$errors->first('usuario')" class="w-fit">

            <x-input-select id="usuario" wire:model.live="usuario">

                <option value="" selected>Seleccione una opción</option>

                @foreach ($usuarios as $usuario)

                    <option value="{{ $usuario->id }}" selected>{{ $usuario->name }}</option>

                @endforeach

            </x-input-select>

        </x-input-group>

        <x-input-group for="ubicacion" label="Almacen" :error="$errors->first('ubicacion')" class="w-fit">

            <x-input-select id="ubicacion" wire:model.live="ubicacion">

                <option value="" selected>Seleccione una opción</option>

                @foreach ($ubicaciones as $ubicacion)

                    <option value="{{ $ubicacion }}" selected>{{ $ubicacion }}</option>

                @endforeach

            </x-input-select>

        </x-input-group>

        <x-input-group for="estado" label="Estado" :error="$errors->first('estado')" class="w-fit">

            <x-input-select id="estado" wire:model.live="estado">

                <option value="" selected>Seleccione una opción</option>
                <option value="nuevo">Nuevo</option>
                <option value="aceptado">Aceptado</option>
                <option value="entregado">Entregado</option>
                <option value="rechaado">Rechaado</option>

            </x-input-select>

        </x-input-group>

    </div>

    @if(count($solicitudes))

        <div class="rounded-lg shadow-xl mb-5 p-4 font-thin md:flex items-center justify-between bg-white">

            <p class="text-xl font-extralight">Se encontraron: {{ number_format($solicitudes->total()) }} registros con los filtros seleccionados.</p>

            <x-button-green
                wire:click="descargarExcel"
                >

                <img wire:loading wire:target="descargarExcel" class="mx-auto h-4 mr-1" src="{{ asset('storage/img/loading3.svg') }}" alt="Loading">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>

                Exportar a Excel

            </x-button-green>

        </div>

        <div class="relative overflow-x-auto rounded-lg shadow-xl">

            <table class="rounded-lg w-full">

                <thead class="border-b border-gray-300 bg-gray-50">

                    <tr class="text-xs  text-gray-500 uppercase text-left traling-wider">

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Folio

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Estado

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Cantidad

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Almacén

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Comentario

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Precio

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Registro

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200 flex-1 sm:flex-none">

                    @foreach($solicitudes as $solicitud)

                        <tr class="text-sm  text-gray-500 bg-white flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 text-center" wire:key="row-{{ $solicitud->id }}">

                            <td class="w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Folio</span>

                                {{ $solicitud->folio }}

                            </td>

                            <td class="capitalize w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Estado</span>

                                {{ $solicitud->estado }}

                            </td>

                            <td class="capitalize w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Cantidad</span>

                                {{ $solicitud->detalles_sum_cantidad }}

                            </td>

                            <td class="capitalize w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Almacén</span>

                                {{ $solicitud->ubicacion }}

                            </td>

                            <td class="capitalize w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Comentario</span>

                                {{ $solicitud->comentario ?? 'N/A' }}

                            </td>

                            <td class="capitalize w-full lg:w-auto p-3 text-gray-800  md:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Precio</span>

                                ${{ number_format($solicitud->precio, 2) }}

                            </td>

                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Registrado</span>

                                {{ $solicitud->created_at }}

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot class="border-gray-300 bg-gray-50">

                    <tr>

                        <td colspan="1" class="py-2 px-5">

                            <select class="bg-white rounded-full text-sm" wire:model="pagination">

                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>

                            </select>

                        </td>

                        <td colspan="20" class="py-2 px-5">
                            {{ $solicitudes->links()}}
                        </td>

                    </tr>

                </tfoot>

            </table>

            <div class="h-full w-full rounded-lg bg-gray-200 bg-opacity-75 absolute top-0 left-0" wire:loading.delay.longer>

                <img class="mx-auto h-16" src="{{ asset('storage/img/loading.svg') }}" alt="">

            </div>

        </div>

    @else

        <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 rounded-full text-lg">

            No hay resultados.

        </div>

    @endif

</div>
