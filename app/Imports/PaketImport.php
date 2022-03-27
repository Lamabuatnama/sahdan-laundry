<?php

namespace App\Imports;

use App\Models\tb_paket;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaketImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new tb_paket([
            'id_outlet' => auth()->user()->id_outlet,
            'jenis'     => $row['jenis'],
            'nama_paket'     => $row['nama_paket'],
            'harga'     => $row['harga'],
        ]);

    /**
    * Menentukan Baris Yang Akan Diskip Pada File Excel
    */

    }
    public function headingrow(): int {
        return 3;
    }
}

