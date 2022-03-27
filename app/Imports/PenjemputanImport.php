<?php

namespace App\Imports;

use App\Models\penjemputan_laundry;
use App\Models\tb_member;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PenjemputanImport implements WithValidation, ToModel,  WithHeadingRow
{
    public function model(array $row)
    {
        $gender = $row['jenis_kelamin'] === 'Laki-laki' ? 'L' : 'P';
        $memberId = null;
        $member = tb_member::where('nama', $row['nama_pelanggan'])
        ->where('alamat', $row['alamat_pelanggan'])
        ->where('jenis_kelamin', $gender)
        ->where('tlp', $row['nomor_telepon'])->first();
        if ($member) {
            $memberId = $member->id;
        } else {
            $member = tb_member::create([
                'nama' => $row['nama_pelanggan'],
                'alamat' => $row['alamat_pelanggan'],
                'jenis_kelamin' => $gender,
                'tlp' => $row['nomor_telepon'],
            ]);
            $memberId = $member->id;
        }

        $status = '';
        switch ($row['status_penjemputan']) {
            case 'tercatat':
                $status = 'tercatat';
                break;
            case 'penjemputan':
                $status = 'penjemputan';
                break;
            case 'selesai':
                $status = 'selesai';
                break;
        }



        return new penjemputan_laundry([
            'id_member' => $memberId,
            'petugas' => $row['nama_petugas_penjemputan'],
            'status' => $status,
        ]);
    }

     /**
    * Menentukan Baris Yang Akan Diskip Pada File Excel
    */
    public function rules(): array
    {
        return [
            'status' => Rule::in(['tercatat', 'penjemputan', 'selesai']),
        ];
    }
}

