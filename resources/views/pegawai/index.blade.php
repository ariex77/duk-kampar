@extends('layouts.app')

@section('content')
<style>
    .table-smaller th, .table-smaller td {
        font-size: 12px !important;
        vertical-align: middle !important;
        text-align: center !important;
    }
    body { margin: 0; padding: 0; }
    .ttd-kepala {
        margin-top: 48px;
        width: 100%;
    }
    .ttd-kepala td {
        border: none !important;
        text-align: right;
        padding-right: 80px;
        padding-top: 32px;
    }
    .nama-kepala {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 0;
    }
    .nip {
        margin-top: 0;
    }
</style>

<div class="container-fluid p-0">
    <h1>DUK Dinkes</h1>
    <a href="{{ route('pegawais.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-smaller w-100">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama & TTL</th>
                    <th>NIP</th>
                    <th>Pangkat & Golongan</th>
                    <th>Jabatan</th>
                    <th>Masa Kerja</th>
                    <th>Status Kepegawaian</th>
                    <th style="min-width:110px;">Nama Sekolah</th>
                    <th>Tahun Lulus</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Tempat Tugas</th>
                    <th class="col-karpeg">No. Seri Karpeg</th>
                    <th class="col-aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawais as $no => $pegawai)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pegawai->nama }}<br>{{ $pegawai->tempat_lahir }}, {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $pegawai->nip }}</td>
                    <td>{{ $pegawai->pangkat }} / {{ $pegawai->golongan }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td>{{ $pegawai->masa_kerja_tahun }} th {{ $pegawai->masa_kerja_bulan }} bln</td>
                    <td>{{ $pegawai->status_kepegawaian }}</td>
                    <td>{{ $pegawai->nama_sekolah }}</td>
                    <td>{{ $pegawai->tahun_lulus }}</td>
                    <td>{{ $pegawai->tingkat_pendidikan }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->usia }}</td>
                    <td>{{ $pegawai->tempat_tugas }}</td>
                    <td class="col-karpeg">{{ $pegawai->nomor_seri_karpeg }}</td>
                    <td class="col-aksi">
                        <a href="{{ route('pegawais.edit', $pegawai->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bagian tanda tangan -->
    <table class="ttd-kepala" style="width:100%; margin-top:0px;">
        <tr>
            <td style="border:none; text-align:right; padding-right:80px; padding-top:32px;">
                <div>Bangkinang, {{ date('d F Y') }}<br>
                Kepala Dinas Kesehatan</div>
                <br><br><br>
                <div class="nama-kepala" style="font-weight:bold; text-decoration:underline;">
                    dr. ASMARA FITRAH ABADI
                </div>
                <div class="pangkat-kepala">
                    Pembina Utama Muda (IVc)
                </div>
                <div class="nip">
                    NIP. 19720911 200312 1 007
                </div>
            </td>
        </tr>
    </table>
</div>
@endsection