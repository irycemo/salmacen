<div>

    <div class="md:flex md:flex-row flex-col md:space-x-4 items-center justify-center gap-3 bg-white rounded-xl mb-5 p-4 space-y-2 md:space-y-0">

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

    </div>

    @if(count($entradas))

        <div class="rounded-lg shadow-xl mb-5 p-4 font-thin md:flex md:items-center md:justify-between bg-white space-y-2 md:space-y-0">

            <p class="tfont-extralight">Se encontraron: {{ number_format($entradas->total()) }} registros con los filtros seleccionados.</p>

            <x-button-green
                wire:click="descargarExcel"
                wire:loading.attr="disabled">

                <img wire:loading wire:target="descargarExcel" class="mx-auto h-4 mr-1" src="{{ asset('storage/img/loading3.svg') }}" alt="Loading">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>

                Exportar a Excel

            </x-button-green>

        </div>

        <div class="relative overflow-x-auto rounded-lg shadow-xl">

            <x-table>

                <x-slot name="head">

                    <x-table.heading >Artículo</x-table.heading>
                    <x-table.heading >Origen</x-table.heading>
                    <x-table.heading >Cantidad</x-table.heading>
                    <x-table.heading >Precio</x-table.heading>
                    <x-table.heading >Registro</x-table.heading>

                </x-slot>

                <x-slot name="body">

                    @foreach($entradas as $entrada)

                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $entrada->id }}">

                            <x-table.cell title="Artículo">

                                {{ ucfirst($articulo->nombre) }}

                            </x-table.cell>

                            <x-table.cell title="Origen">

                                {{ $entrada->origen }}

                            </x-table.cell>

                            <x-table.cell title="Cantidad">

                                {{ $entrada->cantidad }}

                            </x-table.cell>

                            <x-table.cell title="Precio">

                                ${{ number_format($entrada->precio, 2) }}

                            </x-table.cell>

                            <x-table.cell title="Registrado">

                                {{ $entrada->created_at }}

                            </x-table.cell>

                        </x-table.row>

                    @endforeach

                </x-slot>

                <x-slot name="tfoot">

                    <x-table.row>

                        <x-table.cell colspan="9" class="bg-gray-50">

                            {{ $entradas->links()}}

                        </x-table.cell>

                    </x-table.row>

                </x-slot>

            </x-table>

        </div>

    @else

        <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 rounded-full text-lg">

            No hay resultados.

        </div>

    @endif

</div>
