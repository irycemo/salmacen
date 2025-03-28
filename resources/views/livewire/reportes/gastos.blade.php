<div>

    <div class="md:flex md:flex-row flex-col md:space-x-4 items-center justify-center gap-3 bg-white rounded-xl mb-5 p-4">

        <x-input-group for="fecha1" label="Fecha inicial" :error="$errors->first('fecha1')" >

            <x-input-text type="date" id="fecha1" wire:model.live="fecha1" />

        </x-input-group>

        <x-input-group for="fecha2" label="Fecha final" :error="$errors->first('fecha2')" >

            <x-input-text type="date" id="fecha2" wire:model.live="fecha2" />

        </x-input-group>

    </div>

    @if($solicitudes->count() > 0)

        <div class="grid grid-cols-3">

            <div class="bg-white rounded-lg shadow-xl p-4 w-full lg:w-1/2 mx-auto space-y-2">

                <span class="font-semibold text-sm">Almacén general</span>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Solicitudes:</strong> {{ $solicitudes->where('ubicacion', 'General')->count() }}</p>

                </div>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Total:</strong> ${{ number_format($solicitudes->where('ubicacion', 'General')->sum('precio'), 2) }}</p>

                </div>

            </div>

            <div class="bg-white rounded-lg shadow-xl p-4 w-full lg:w-1/2 mx-auto space-y-2">

                <span class="font-semibold text-sm">Almacén catastro</span>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Solicitudes:</strong> {{ $solicitudes->where('ubicacion', 'Catastro')->count() }}</p>

                </div>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Total:</strong> ${{ number_format($solicitudes->where('ubicacion', 'Catastro')->sum('precio'), 2) }}</p>

                </div>

            </div>

            <div class="bg-white rounded-lg shadow-xl p-4 w-full lg:w-1/2 mx-auto space-y-2">

                <span class="font-semibold text-sm">Almacén rpp</span>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Solicitudes:</strong> {{ $solicitudes->where('ubicacion', 'RPP')->count() }}</p>

                </div>

                <div class="rounded-lg bg-gray-100 py-1 px-2">

                    <p><strong>Total:</strong> ${{ number_format($solicitudes->where('ubicacion', 'RPP')->sum('precio'), 2) }}</p>

                </div>

            </div>

        </div>

    @endif

</div>
