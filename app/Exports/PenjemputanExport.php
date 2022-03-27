<?php

namespace App\Exports;

use App\Models\penjemputan_laundry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;


class PenjemputanExport implements FromCollection, WithHeadings , WithEvents , WithMapping
{

    /**
     * Mendeklarasikan Field Yang Akan Di Export Menjadi Sebuah File Excel
     */

    public function map($penjemputan): array
    {
        return [
            $penjemputan->id,
            $penjemputan->member->nama,
            $penjemputan->member->alamat,
            $penjemputan->member->tlp,
            $penjemputan->petugas,
            $penjemputan->status,
        ];
    }

    /**
     * Untuk
     */

    public function collection()
    {
        return penjemputan_laundry::all();
    }

    /**
     * Menambahkan Heading Pada File Excel
     */

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat',
            'tlp',
            'Petugas',
            'status',

        ];
    }


    /**
     * Membuat Event Yang Akan DiGunakan
     * Seperti : border, warna, dan font
     */

    public function registerEvents(): array
    {
            //no
            return [ AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->getColumnDimension('A')->setAutoSize(true);
            $event->sheet->getColumnDimension('B')->setAutoSize(true);
            $event->sheet->getColumnDimension('C')->setAutoSize(true);
            $event->sheet->getColumnDimension('D')->setAutoSize(true);
            $event->sheet->getColumnDimension('E')->setAutoSize(true);
            $event->sheet->getColumnDimension('F')->setAutoSize(true);
            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:F1');
            $event->sheet->setCellValue('A1', 'DATA PENJEMPUTAN LAUNDRY');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal
            (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


            $event->sheet->getStyle('A3:F'. $event->sheet->getHighestRow())->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '252525'],
                    ],
                ],
            ]);

        }
        ];

    }

}
