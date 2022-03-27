<?php

namespace App\Exports;

use App\Models\tb_member;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MemberExport implements FromCollection, WithHeadings , WithEvents , WithMapping
{

    /**
     * Mendeklarasikan Field Yang Akan Di Export Menjadi Sebuah File Excel
     */
    public function map($member): array
    {
        return [
            $member->id,
            $member->nama,
            $member->alamat,
            $member->jenis_kelamin,
            $member->tlp,
        ];
    }

    /**
     * Untuk
     */
    public function collection()
    {
        return tb_member::all();
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
            'Jenis Kelamin',
            'Nomer Telepon',
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
            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:E1');
            $event->sheet->setCellValue('A1', 'DATA MEMBER');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal
            (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


            $event->sheet->getStyle('A3:E'. $event->sheet->getHighestRow())->applyFromArray([
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
