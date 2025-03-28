<?php

namespace App\Exports;

use App\Models\Solicitud;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class SolicitudesExport implements FromCollection,  WithProperties, WithDrawings, ShouldAutoSize, WithEvents, WithCustomStartCell, WithColumnWidths, WithHeadings, WithMapping
{

    public function __construct(public $usuario, public $ubicacion, public $articulo, public $estado, public $fecha1, public $fecha2)
    {}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Solicitud::withSum('detalles', 'cantidad')
                            ->when(isset($this->usuario), function ($q){
                                $q->where('creado_por', $this->usuario);
                            })
                            ->when(isset($this->ubicacion), function ($q){
                                $q->where('ubicacion', $this->ubicacion);
                            })
                            ->when(isset($this->articulo), function ($q){
                                $q->whereHas('detalle',function($q){
                                    $q->whereHas('articuloDisponible', function($q){
                                        $q->where('articulo_id', $this->articulo);
                                    });
                                });
                            })
                            ->when(isset($this->estado), function ($q){
                                $q->where('estado', $this->estado);
                            })
                            ->whereBetween('created_at', [$this->fecha1 . ' 00:00:00', $this->fecha2 . ' 23:59:59'])
                            ->get();
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath(storage_path('app/public/img/logo2.png'));
        $drawing->setHeight(90);
        $drawing->setOffsetX(10);
        $drawing->setOffsetY(10);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function headings(): array
    {
        return [
            'Folio',
            'Estado',
            'Cantidad',
            'Almacén',
            'Comentario',
            'Precio',
            'Registrado en',
        ];
    }

    public function map($solicitud): array
    {
        return [
            $solicitud->folio,
            $solicitud->estado,
            $solicitud->detalles_sum_cantidad,
            $solicitud->ubicacion,
            $solicitud->comentario ?? 'N/A',
            $solicitud->precio,
            $solicitud->created_at,
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => auth()->user()->name,
            'title'          => 'Reporte de Solicitudes (Sistema de Almacén)',
            'company'        => 'Instituto Registral Y Catastral Del Estado De Michoacán De Ocampo',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1', "Instituto Registral Y Catastral Del Estado De Michoacán De Ocampo\nReporte de solicitudes (Sistema de Almacén)\n" . now()->format('d-m-Y'));
                $event->sheet->getStyle('A1')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                ]);
                $event->sheet->getRowDimension('1')->setRowHeight(90);
                $event->sheet->getStyle('A2:G2')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]
                );
            },
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function columnWidths(): array
    {
        return [
            'E' => 20,
            'F' => 20,

        ];
    }

}
