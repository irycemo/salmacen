<div>

    <x-header>Seguimiento</x-header>

    <div class="grid grid-cols-12 gap-3">

        <div class="bg-white shadow-xl p-4 rounded-lg col-span-3">

            <x-input-group for="articulo" label="Artículo" :error="$errors->first('articulo')" class="w-full">

                <x-input-text id="articulo" wire:model.live.debounce.500ms="articulo" />

            </x-input-group>

            <div>

                <x-table>

                    <x-slot name="head">

                        <x-table.heading >Artículo</x-table.heading>
                        <x-table.heading >Marca</x-table.heading>
                        <x-table.heading ></x-table.heading>

                    </x-slot>

                    <x-slot name="body">

                        @forelse ($this->articulos as $articulo)

                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $articulo->id }}">

                            <x-table.cell>

                                {{ ucfirst($articulo->nombre) }}

                            </x-table.cell>

                            <x-table.cell>

                                {{ ucfirst($articulo->marca) }}

                            </x-table.cell>

                            <x-table.cell>

                                <x-button-green
                                    wire:click="seleccionarArticulo({{ $articulo->id }})"
                                    wire:target="seleccionarArticulo({{ $articulo->id }})"
                                    wire:loading.attr="disabled">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>

                                </x-button-green>

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

        <div class="col-span-9 space-y-3">

            <div class="bg-white shadow-xl p-4 rounded-lg text-sm">

                @if($articuloSeleccionado)

                    <div class="flex items-center gap-3 mb-5">

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Artículo:</strong> {{ ucfirst($articuloSeleccionado->nombre) }}</p>

                        </div>

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Marca:</strong> {{ $articuloSeleccionado->marca }}</p>

                        </div>

                        @if($articuloSeleccionado->serial)

                            <div class="rounded-lg bg-gray-100 py-1 px-2">

                                <p><strong># de serie:</strong> {{ $articuloSeleccionado->serial }}</p>

                            </div>

                        @endif

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Descripción:</strong> {{ ucfirst($articuloSeleccionado->descripcion) }}</p>

                        </div>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Stock en almacén general:</strong> {{ $articuloDisponibleGeneral->stock_total ?? 0 }}</p>

                        </div>

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Stock en almacén catastro:</strong> {{ $articuloDisponibleCatastro->stock_total ?? 0 }}</p>

                        </div>

                        <div class="rounded-lg bg-gray-100 py-1 px-2">

                            <p><strong>Stock en almacén rpp:</strong> {{ $articuloDisponibleRpp->stock_total ?? 0 }}</p>

                        </div>

                    </div>

                @endif

            </div>

            <div class="grid grid-cols-2 gap-3">

                <div class="bg-white shadow-xl p-4 rounded-lg">

                    @if($entradas)

                        <x-h4>Entradas</x-h4>

                        <div>

                            <x-table>

                                <x-slot name="head">

                                    <x-table.heading >Origen</x-table.heading>
                                    <x-table.heading >Cantidad</x-table.heading>
                                    <x-table.heading >Precio</x-table.heading>
                                    <x-table.heading >Registro</x-table.heading>

                                </x-slot>

                                <x-slot name="body">

                                    @foreach ($entradas as $entrada)

                                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $entrada->id }}">

                                            <x-table.cell>

                                                {{ ucfirst($entrada->origen) }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                {{ $entrada->cantidad }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                ${{ number_format($entrada->precio, 2) }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                <span class="font-semibold">{{$entrada->creadoPor?->name}}</span> <br>

                                                {{ $entrada->created_at }}

                                            </x-table.cell>

                                        </x-table.row>

                                    @endforeach

                                </x-slot>

                                <x-slot name="tfoot"></x-slot>

                            </x-table>

                        </div>

                    @endif

                </div>

                <div class="bg-white shadow-xl p-4 rounded-lg">

                    @if($solicitudes)

                        <x-h4>Solicitudes</x-h4>

                        <div>

                            <x-table>

                                <x-slot name="head">

                                    <x-table.heading >Folio</x-table.heading>
                                    <x-table.heading >Almacen</x-table.heading>
                                    <x-table.heading >Artículos</x-table.heading>
                                    <x-table.heading >Precio</x-table.heading>
                                    <x-table.heading >Registro</x-table.heading>

                                </x-slot>

                                <x-slot name="body">

                                    @foreach ($solicitudes as $solicitud)

                                        <x-table.row wire:loading.class.delaylongest="opacity-50" wire:key="row-{{ $solicitud->id }}">

                                            <x-table.cell>

                                                {{ $solicitud->folio }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                {{ ucfirst($solicitud->ubicacion) }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                <p>{{ $solicitud->detalles_sum_cantidad ?? '' }} artículo(s) en total</p>

                                                @foreach($solicitud->detalles as $detalle)

                                                    @if($detalle->articuloDisponible->articulo_id = $articuloSeleccionado->id)

                                                        <p>{{ $detalle->cantidad }} artículo(s) seleccionado</p>

                                                    @endif

                                                @endforeach

                                            </x-table.cell>

                                            <x-table.cell>

                                                ${{ number_format($solicitud->precio, 2) }}

                                            </x-table.cell>

                                            <x-table.cell>

                                                <span class="font-semibold">{{$solicitud->creadoPor->name}}</span> <br>

                                                {{ $solicitud->created_at }}

                                            </x-table.cell>

                                        </x-table.row>

                                    @endforeach

                                </x-slot>

                                <x-slot name="tfoot"></x-slot>

                            </x-table>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>
