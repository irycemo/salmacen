<div>

    <div class="md:flex flex-col md:flex-row justify-center md:space-x-3 space-y-2 md:space-y-0 items-center bg-white rounded-xl mb-5 p-4">

        <x-input-group for="ubicacion" label="Almacén" :error="$errors->first('ubicacion')">

            <x-input-select id="ubicacion" wire:model.live="ubicacion">

                <option value="" selected>Seleccione una opción</option>

                @foreach ($ubicaciones as $ubicacion)

                    <option value="{{ $ubicacion }}" selected>{{ $ubicacion }}</option>

                @endforeach

            </x-input-select>

        </x-input-group>

        <x-input-group for="categoria" label="Categoría" :error="$errors->first('categoria')">

            <x-input-select id="categoria" wire:model.live="categoria">

                <option value="" selected>Seleccione una opción</option>

                @foreach ($categorias as $categoria)

                    <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>

                @endforeach

            </x-input-select>

        </x-input-group>

    </div>

    @if(count($articulos))

        <div class="rounded-lg shadow-xl mb-5 p-4 font-thin md:flex md:items-center md:justify-between bg-white space-y-2 md:space-y-0">

            <p class="font-extralight">Se encontraron: {{ number_format($articulos->total()) }} registros con los filtros seleccionados.</p>

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

        <div class="overflow-x-auto rounded-lg shadow-xl">

            <x-table>

                <x-slot name="head">

                    <x-table.heading >Nombre</x-table.heading>
                    <x-table.heading >Marca</x-table.heading>
                    <x-table.heading >Stock</x-table.heading>
                    <x-table.heading >Descripcion</x-table.heading>
                    <x-table.heading >Registro</x-table.heading>

                </x-slot>

                <x-slot name="body">

                    @foreach($articulos as $articulo)

                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $articulo->id }}">

                            <x-table.cell title="Nombre">

                                {{ ucfirst($articulo->nombre) }}

                            </x-table.cell>

                            <x-table.cell title="Marca">

                                {{ $articulo->marca }}
                            </x-table.cell>

                            <x-table.cell title="Marca">

                                {{ $articulo->articulosDisponibles->first()->stock_total }}

                            </x-table.cell>

                            <x-table.cell title="Descripción">

                                {{ ucfirst($articulo->descripcion) }}

                            </x-table.cell>

                            <x-table.cell title="Registrado">

                                {{ $articulo->created_at }}

                            </x-table.cell>

                        </x-table.row>

                    @endforeach

                </x-slot>

                <x-slot name="tfoot">

                    <x-table.row>

                        <x-table.cell colspan="9" class="bg-gray-50">

                            {{ $articulos->links()}}

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
