<div class="">

    <div class="mb-6">

        <x-header>Solicitudes</x-header>

        <div class="flex justify-between">

            <div class="flex gap-3">

                <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar" class="bg-white rounded-full text-sm">

                <x-input-select class="bg-white rounded-full text-sm w-min" wire:model.live="pagination">

                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>

                </x-input-select>

            </div>

            @can('Crear solicitud')

                <a href="{{ route('solicitud') }}" class="bg-gray-500 hover:shadow-lg hover:bg-gray-700 text-sm py-2 px-4 text-white rounded-full hidden md:block items-center justify-center focus:outline-gray-400 focus:outline-offset-2">Agregar nueva solicitud</a>

                <a href="{{ route('solicitud') }}" class="bg-gray-500 hover:shadow-lg hover:bg-gray-700 float-right text-sm py-2 px-4 text-white rounded-full md:hidden focus:outline-gray-400 focus:outline-offset-2">+</a>

            @endcan

        </div>

    </div>

    <div class="overflow-x-auto rounded-lg shadow-xl border-t-2 border-t-gray-500">

        <x-table>

            <x-slot name="head">

                <x-table.heading sortable wire:click="sortBy('folio')" :direction="$sort === 'folio' ? $direction : null">Folio</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('estado')" :direction="$sort === 'estado' ? $direction : null">Estado</x-table.heading>
                <x-table.heading >Cantidad</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('ubicacion')" :direction="$sort === 'ubicacion' ? $direction : null">Almacen</x-table.heading>
                <x-table.heading >Comentario</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sort === 'created_at' ? $direction : null">Registro</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('updated_at')" :direction="$sort === 'updated_at' ? $direction : null">Actualizado</x-table.heading>
                <x-table.heading >Acciones</x-table.heading>

            </x-slot>

            <x-slot name="body">

                @forelse ($solicitudes as $solicitud)

                    <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $solicitud->id }}">

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Folio</span>

                            {{ $solicitud->folio }}

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Folio</span>

                            <span class="bg-{{ $solicitud->estado_color }} py-1 px-2 rounded-full text-white text-xs">{{ ucfirst($solicitud->estado) }}</span>

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Folio</span>

                            {{ $solicitud->detalles_sum_cantidad }}

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Almacen</span>

                            <span class="capitalize">{{ $solicitud->ubicacion }}</span>

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Comentario</span>

                            {{ $solicitud->comentario ?? 'N/A' }}

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Registrado</span>


                            <span class="font-semibold">@if($solicitud->creadoPor != null)Registrado por: {{$solicitud->creadoPor->name}} @else Registro: @endif</span> <br>

                            {{ $solicitud->created_at }}

                        </x-table.cell>

                        <x-table.cell>

                            <span class="font-semibold">@if($solicitud->actualizadoPor != null)Actualizado por: {{$solicitud->actualizadoPor->name}} @else Actualizado: @endif</span> <br>

                            {{ $solicitud->updated_at }}

                        </x-table.cell>

                        <x-table.cell>

                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Acciones</span>

                            <div class="ml-3 relative" x-data="{ open_drop_down:false }">

                                <div>

                                    <button x-on:click="open_drop_down=true" type="button" class="rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>

                                    </button>

                                </div>

                                <div x-cloak x-show="open_drop_down" x-on:click="open_drop_down=false" x-on:click.away="open_drop_down=false" class="z-50 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">

                                    <button
                                        wire:click="abrirModalVer({{  $solicitud->id }})"
                                        wire:loading.attr="disabled"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                        role="menuitem">
                                        Ver
                                    </button>

                                    @if($solicitud->estado == 'nuevo')

                                        <a
                                            href="{{ route('solicitud', $solicitud) }}"
                                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                            role="menuitem">
                                            Editar
                                        </a>

                                    @elseif($solicitud->estado == 'entregado')

                                        <button
                                            wire:click="reimprimir({{  $solicitud->id }})"
                                            wire:loading.attr="disabled"
                                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                            role="menuitem">
                                            Reimprimir recibo
                                        </button>

                                    @endif

                                </div>

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

                        {{ $solicitudes->links()}}

                    </x-table.cell>

                </x-table.row>

            </x-slot>

        </x-table>

    </div>

    <x-dialog-modal wire:model="modalVer" maxWidth="sm">

        <x-slot name="title">

           Detalles de la solicitud

        </x-slot>

        <x-slot name="content">

            <div class="space-y-2 mb-3">

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Folio:</strong> {{ $modelo_editar->folio }}</p>

                </div>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Solicitante:</strong> {{ $modelo_editar->creadoPor?->name  }}</p>

                </div>

                @if($modelo_editar->getkey())

                    <div class="rounded-lg bg-gray-100 py-1 px-2">

                        <p><strong>Fecha de solicitud:</strong> {{ $modelo_editar->created_at }}</p>

                    </div>

                @endif

            </div>

            <div class="mt-5">

                <x-table>

                    <x-slot name="head">

                        <x-table.heading >Artículo</x-table.heading>
                        <x-table.heading >Cantidad</x-table.heading>

                    </x-slot>

                    <x-slot name="body">

                        @forelse ($modelo_editar->detalles as $detalle)

                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $detalle->id }}">

                            <x-table.cell>

                                {{ ucfirst($detalle->articuloDisponible->articulo->nombre) }}

                            </x-table.cell>

                            <x-table.cell>

                                <div class="flex items-center gap-1">

                                    {{ $detalle->cantidad }}

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

                    </x-slot>

                </x-table>

            </div>

        </x-slot>

        <x-slot name="footer">

            <div class="flex flex-col space-y-3 w-full">

                <x-input-group for="comentario" label="" :error="$errors->first('comentario')" class="text-left">

                    <textarea @if(auth()->id() == $modelo_editar->creado_por) readonly @endif autofocus="false" class="bg-white rounded text-sm w-full " rows="3" wire:model="comentario" placeholder="Comentario del rechazo"></textarea>

                </x-input-group>

                <div class="flex gap-3 justify-end">

                    @if(auth()->user()->hasRole(['Administrador', 'Almacenista', 'Contadora(o)', 'Delegada(o) Administrativo']))

                        @if(!in_array($modelo_editar->estado, ['entregado', 'rechazado']))

                            @if($modelo_editar->estado != 'aceptado')

                                <x-button-green
                                    wire:click="aceptar"
                                    wire:loading.attr="disabled"
                                    wire:target="aceptar">

                                    <img wire:loading wire:target="aceptar" class="mx-auto h-4 mr-1" src="{{ asset('storage/img/loading3.svg') }}" alt="Loading">

                                    <span>Aceptar</span>
                                </x-button-green>

                            @endif

                            <x-button-blue
                                wire:click="entregar"
                                wire:loading.attr="disabled"
                                wire:target="entregar">

                                <img wire:loading wire:target="entregar" class="mx-auto h-4 mr-1" src="{{ asset('storage/img/loading3.svg') }}" alt="Loading">

                                <span>Entregar</span>
                            </x-button-blue>

                            <x-button-gray
                                wire:click="rechazar"
                                wire:loading.attr="disabled"
                                wire:target="rechazar">

                                <img wire:loading wire:target="rechazar" class="mx-auto h-4 mr-1" src="{{ asset('storage/img/loading3.svg') }}" alt="Loading">

                                <span>Rechazar</span>
                            </x-button-gray>

                        @endif

                    @endif

                    <x-button-red
                        wire:click="$toggle('modalVer')"
                        wire:loading.attr="disabled"
                        wire:target="$toggle('modalVer')"
                        type="button">
                        X
                    </x-button-red>

                </div>

            </div>

        </x-slot>

    </x-dialog-modal>

    <x-confirmation-modal wire:model="modalBorrar" maxWidth="sm">

        <x-slot name="title">
            Eliminar Solicitud
        </x-slot>

        <x-slot name="content">
            ¿Esta seguro que desea eliminar la solicitud? No sera posible recuperar la información.
        </x-slot>

        <x-slot name="footer">

            <x-secondary-button
                wire:click="$toggle('modalBorrar')"
                wire:loading.attr="disabled"
            >
                No
            </x-secondary-button>

            <x-danger-button
                class="ml-2"
                wire:click="borrar"
                wire:loading.attr="disabled"
                wire:target="borrar"
            >
                Borrar
            </x-danger-button>

        </x-slot>

    </x-confirmation-modal>

</div>
