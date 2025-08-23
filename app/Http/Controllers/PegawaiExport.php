<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pegawai::all([
            'nama', 'tempat_lahir', 'tanggal_lahir', 'nip', 'pangkat', 'golongan', 'jabatan',
            'masa_kerja_tahun', 'masa_kerja_bulan', 'status_kepegawaian', 'nama_sekolah',
            'tahun_lulus', 'tingkat_pendidikan', 'jenis_kelamin', 'usia', 'tempat_tugas', 'nomor_seri_karpeg'
        ]);
    }

    public function headings(): array
    {
        return [
            'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'NIP', 'Pangkat', 'Golongan', 'Jabatan',
            'Masa Kerja Tahun', 'Masa Kerja Bulan', 'Status Kepegawaian', 'Nama Sekolah',
            'Tahun Lulus', 'Tingkat Pendidikan', 'Jenis Kelamin', 'Usia', 'Tempat Tugas', 'Nomor Seri Karpeg'
        ];
    }
}