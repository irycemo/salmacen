<div>

    <x-header>Solicitud</x-header>

    <div class="grid grid-cols-5 w-full gap-3 lg:w-2/3 mx-auto">

        <div class="bg-white rounded-xl p-4 shadow-lg col-span-3">

            <x-h4>Artículos disponibles</x-h4>

            <x-input-group for="search" label="Buscar" :error="$errors->first('search')" class="my-5 w-fit">

                <x-input-text id="search" wire:model.live.debounce.500ms="search" />

            </x-input-group>

            <div>

                <x-table>

                    <x-slot name="head">

                        <x-table.heading >Artículo</x-table.heading>
                        <x-table.heading >Marca</x-table.heading>
                        <x-table.heading >Cantidad</x-table.heading>

                    </x-slot>

                    <x-slot name="body">

                        @forelse ($this->articulos as $articulo)

                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $articulo->id }}">

                            <x-table.cell>

                                {{ ucfirst($articulo->articulo->nombre) }}

                            </x-table.cell>

                            <x-table.cell>

                                {{ ucfirst($articulo->articulo->marca) }}

                            </x-table.cell>

                            <x-table.cell>

                                <div class="flex items-center gap-1">

                                    <input type="number" class="w-14 rounded-lg py-0 px-2 text-sm" value="1" id="input-{{ $articulo->id }}"">

                                    <x-button-green
                                        @click="$wire.agregar({{ $articulo->id }}, document.getElementById('input-' + {{ $articulo->id }}).value)"
                                        wire:loading.attr="disabled">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>

                                    </x-button-green>

                                </div>

                            </x-table.cell>

                        </x-table.row>

                        @empty

                            <x-table.row>

                                <x-table.cell colspan="9">

                                    <div class="bg-white text-gray-500 text-center p-5 rounded-full text-lg">

                                        No hay resultados.

                                    </div>

                                </x-table.cell>

                            </x-table.row>

                        @endforelse

                    </x-slot>

                    <x-slot name="tfoot">

                        <x-table.row>

                            <x-table.cell colspan="9" class="bg-gray-50">

                                {{ $this->articulos->links()}}

                            </x-table.cell>

                        </x-table.row>

                    </x-slot>

                </x-table>

            </div>

        </div>

        <div class="bg-white rounded-xl p-4 shadow-lg col-span-2 space-y-4">

            <x-h4>Artículos solicitados</x-h4>

            @if($solicitud->getKey())

                <div class="mt-5">

                    <x-table>

                        <x-slot name="head">

                            <x-table.heading >Artículo</x-table.heading>
                            <x-table.heading >Marca</x-table.heading>
                            <x-table.heading >Cantidad</x-table.heading>

                        </x-slot>

                        <x-slot name="body">

                            @forelse ($solicitud->detalles as $detalle)

                            <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $detalle->id }}">

                                <x-table.cell>

                                    {{ ucfirst($detalle->articuloDisponible->articulo->nombre) }}

                                </x-table.cell>

                                <x-table.cell>

                                    {{ ucfirst($detalle->articuloDisponible->articulo->marca) }}

                                </x-table.cell>

                                <x-table.cell>

                                    <div class="flex items-center gap-3">

                                        {{ $detalle->cantidad }}

                                        <x-button-red
                                            wire:click="eliminarDetalle({{ $detalle->id }})"
                                            wire:loading.attr="disabled"
                                            wire:target="eliminarDetalle({{ $detalle->id }})">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </x-button-red>

                                    </div>

                                </x-table.cell>

                            </x-table.row>

                            @empty

                                <x-table.row>

                                    <x-table.cell colspan="9">

                                        <div class="bg-white text-gray-500 text-center p-5 rounded-full text-lg">

                                            No hay resultados.

                                        </div>

                                    </x-table.cell>

                                </x-table.row>

                            @endforelse

                        </x-slot>

                        <x-slot name="tfoot">

                            <x-table.row>



                            </x-table.row>

                        </x-slot>

                    </x-table>

                </div>

                <x-link-blue href="{{ route('solicitudes') }}">

                    Finalizar solicitud

                </x-link-blue>

            @endif

        </div>

    </div>

</div>
