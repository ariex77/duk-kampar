<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DUK Pegawai</title>
    <style>
        body { font-size: 12px; margin: 0; padding: 0; }
        table { width: 100%; border-collapse: collapse; page-break-inside: avoid; }
        th, td { border: 1px solid #000; padding: 4px; vertical-align: middle; }
        th { background-color: #f0f0f0; text-align: center; }
        .page-break { page-break-after: always; }
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
        }
        .nip {
            margin-top: 0;
        }
    </style>
</head>
<body>
@php
    $chunks = $pegawais->chunk(10);
@endphp

@foreach($chunks as $index => $chunk)
    <h3 style="text-align:center;">Daftar Urut Kepangkatan (DUK) Dinas Kesehatan</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama & TTL</th>
                <th>NIP</th>
                <th>Pangkat / Golongan</th>
                <th>Jabatan</th>
                <th>Masa Kerja</th>
                <th>Status</th>
                <th>Sekolah</th>
                <th>Lulus</th>
                <th>Pendidikan</th>
                <th>JK</th>
                <th>Usia</th>
                <th>Tempat Tugas</th>
                <th>Karpeg</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chunk as $no => $pegawai)
            <tr>
                <td>{{ ($index * 10) + $no + 1 }}</td>
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
                <td>{{ $pegawai->nomor_seri_karpeg }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($loop->last)
        <!-- Tanda tangan hanya di halaman terakhir -->
        <table class="ttd-kepala">
            <tr>
                <td>
                    Bangkinang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                    Kepala Dinas Kesehatan<br><br><br><br>
                    <div class="nama-kepala">dr. ASMARA FITRAH ABADI</div>
                    <div>Pembina Utama Muda (IV/c)</div>
                    <div class="nip">NIP. 19720911 200312 1 007</div>
                </td>
            </tr>
        </table>
    @else
        <div class="page-break"></div>
    @endif
@endforeach
</body>
</html>
