<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'pangkat',
        'golongan',
        'jabatan',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
        'status_kepegawaian',
        'nama_sekolah',
        'tahun_lulus',
        'tingkat_pendidikan',
        'jenis_kelamin',
        'usia',
        'tempat_tugas',
        'nomor_seri_karpeg',
        'user_id',
    ];
}