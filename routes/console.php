<?php

use App\Models\Entrada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Services\ArticuloDisponibleService;
use Illuminate\Foundation\Console\ClosureCommand;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('cargar_entradas', function (){


    $fileStream = fopen(storage_path('app/public/entradas.csv'), 'r');

    $csvContents = [];

    while (($line = fgetcsv($fileStream)) !== false) {

        $csvContents[] = $line;

    }

    fclose($fileStream);

    $skipHeader = true;

    foreach($csvContents as $content){

        if ($skipHeader) {

            $skipHeader = false;

            continue;

        }

        if($content[2] == 0) continue;

        try {

            DB::transaction(function () use($content){

                $entrada = Entrada::create([
                    'articulo_id' => $content[0],
                    'cantidad' => $content[2],
                    'precio' => (int) $content[2] * (float)$content[3],
                    'origen' => $content[4],
                    'descripcion' => $content[5]
                ]);

                (new ArticuloDisponibleService())->crear($content[0], $entrada->id, $content[2], $content[3]);

            });

        } catch (\Throwable $th) {

            return "Error: " . $th->getMessage();

            Log::error('Error al importar entradas. ' . $th);

        }

    }

    return "Imported!";

});