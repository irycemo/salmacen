<div>

    <x-header>Reportes</x-header>

    <div class="p-4 mb-5 bg-white shadow-lg rounded-lg">

        <x-input-group for="area" label="Área" :error="$errors->first('area')" class="w-fit mx-auto">

            <x-input-select id="area" wire:model.live="area">

                <option selected value="">Selecciona una área</option>
                <option value="articulos">Artículos</option>
                <option value="entradas">Entradas</option>
                <option value="solicitudes">Solicitudes</option>
                <option value="gastos">Gastos</option>

            </x-input-select>

        </x-input-group>

    </div>

    @if ($verArticulos)

        @livewire('reportes.articulos', ['fecha1' => $this->fecha1, 'fecha2' => $this->fecha2])

    @endif

    @if ($verEntradas)

        @livewire('reportes.entradas', ['fecha1' => $this->fecha1, 'fecha2' => $this->fecha2])

    @endif

    @if ($verSolicitudes)

        @livewire('reportes.solicitudes', ['fecha1' => $this->fecha1, 'fecha2' => $this->fecha2])

    @endif

    @if ($verGastos)

        @livewire('reportes.gastos', ['fecha1' => $this->fecha1, 'fecha2' => $this->fecha2])

    @endif

</div>
