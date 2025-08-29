<div class="row g-3">
    <div class="col-md-6">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $pegawai->nama ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $pegawai->tempat_lahir ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>NIP</label>
    <input type="text" name="nip" class="form-control" value="{{ old('nip', $pegawai->nip ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Pangkat</label>
    <select name="pangkat" class="form-control" required>
        @foreach([
            'Pembina Utama',
            'Pembina Utama Madya',
            'Pembina Utama Muda',
            'Pembina Tingkat I',
            'Pembina',
            'Penata Tingkat I',
            'Penata',
            'Penata Muda Tingkat I',
            'Penata Muda',
            'Pengatur Tingkat I',
            'Pengatur',
            'Pengatur Muda Tingkat I',
            'Pengatur Muda',
            'PPPK'
        ] as $pangkat)
        <option value="{{ $pangkat }}" {{ old('pangkat', $pegawai->pangkat ?? '') == $pangkat ? 'selected' : '' }}>{{ $pangkat }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label>Golongan</label>
    <select name="golongan" class="form-control" required>
        @foreach([
            'IVe','IVd','IVc','IVb','IVa',
            'IIId','IIIc','IIIb','IIIa',
            'IId','IIc','IIb','IIa','PPPK'
        ] as $golongan)
        <option value="{{ $golongan }}" {{ old('golongan', $pegawai->golongan ?? '') == $golongan ? 'selected' : '' }}>{{ $golongan }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pegawai->jabatan ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Masa Kerja (Tahun)</label>
    <input type="number" name="masa_kerja_tahun" class="form-control" value="{{ old('masa_kerja_tahun', $pegawai->masa_kerja_tahun ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Masa Kerja (Bulan)</label>
    <input type="number" name="masa_kerja_bulan" class="form-control" value="{{ old('masa_kerja_bulan', $pegawai->masa_kerja_bulan ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Status Kepegawaian</label>
    <select name="status_kepegawaian" class="form-control" required>
        @foreach(['PNS','PPPK'] as $status)
        <option value="{{ $status }}" {{ old('status_kepegawaian', $pegawai->status_kepegawaian ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label>Nama Sekolah</label>
    <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $pegawai->nama_sekolah ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Tahun Lulus</label>
    <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $pegawai->tahun_lulus ?? '') }}" required>
</div>
<div class="col-md-3">
    <label>Tingkat Pendidikan</label>
    <select name="tingkat_pendidikan" class="form-control" required>
        @foreach(['SD','SLTP','SLTA','D1','D2','D3','D4','S1','S2','S3'] as $tp)
        <option value="{{ $tp }}" {{ old('tingkat_pendidikan', $pegawai->tingkat_pendidikan ?? '') == $tp ? 'selected' : '' }}>{{ $tp }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" required>
        @foreach(['Laki-laki','Perempuan'] as $jk)
        <option value="{{ $jk }}" {{ old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') == $jk ? 'selected' : '' }}>{{ $jk }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <label>Usia</label>
    <input type="number" name="usia" id="usia" class="form-control" value="{{ old('usia', $pegawai->usia ?? '') }}" readonly>
</div>
<div class="col-md-3">
    <label>Tempat Tugas</label>
    <select name="tempat_tugas" class="form-select" required>
        <option value="">-- Pilih Tempat Tugas --</option>
        @foreach([
            'Dinas Kesehatan',
            'UPTD Labkesmas',
            'UPTD IFK',
            'UPTD Puskesmas Air Tiris',
            'UPTD Puskesmas Bangkinang',
            'UPTD Puskesmas Batu Bersurat',
            'UPTD Puskesmas Batu Sasak',
            'UPTD Puskesmas Gema',
            'UPTD Puskesmas Gunung Bungsu',
            'UPTD Puskesmas Gunung Sahilan',
            'UPTD Puskesmas Gunung Sari',
            'UPTD Puskesmas Kampa',
            'UPTD Puskesmas Kota Garo',
            'UPTD Puskesmas Kubang Jaya',
            'UPTD Puskesmas Kuntu',
            'UPTD Puskesmas Kuok',
            'UPTD Puskesmas Laboy Jaya',
            'UPTD Puskesmas Lipat Kain',
            'UPTD Puskesmas Muara Uwai',
            'UPTD Puskesmas Pandau Jaya',
            'UPTD Puskesmas Pangkalan Baru',
            'UPTD Puskesmas Pantai Cermin',
            'UPTD Puskesmas Pantai Raja',
            'UPTD Puskesmas Petapahan',
            'UPTD Puskesmas Pulau Gadang',
            'UPTD Puskesmas Rumbio',
            'UPTD Puskesmas Salo',
            'UPTD Puskesmas Sawah',
            'UPTD Puskesmas Sibiruang',
            'UPTD Puskesmas Simalinyang',
            'UPTD Puskesmas Sinamanenek',
            'UPTD Puskesmas Suka Ramai',
            'UPTD Puskesmas Sungai Pagar',
            'UPTD Puskesmas Tambang',
            'UPTD Puskesmas Tanah Tinggi',
            'UPTD Puskesmas Tapung',
        ] as $unit)
            <option value="{{ $unit }}" {{ old('tempat_tugas', $pegawai->tempat_tugas ?? '') == $unit ? 'selected' : '' }}>
                {{ $unit }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-3">
    <label>Nomor Seri Karpeg</label>
    <input type="text" name="nomor_seri_karpeg" class="form-control" value="{{ old('nomor_seri_karpeg', $pegawai->nomor_seri_karpeg ?? '') }}" required>
</div>

<script>
function hitungUsia() {
    const tglLahirInput = document.getElementById('tanggal_lahir');
    const usiaField = document.getElementById('usia');
    if (!tglLahirInput || !usiaField) return;
    const tglLahir = tglLahirInput.value;
    if (tglLahir) {
        const today = new Date();
        const birthDate = new Date(tglLahir);
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        usiaField.value = age > 0 ? age : 0;
    } else {
        usiaField.value = '';
    }
}

window.addEventListener('DOMContentLoaded', function() {
    const tglLahirInput = document.getElementById('tanggal_lahir');
    if (tglLahirInput) {
        tglLahirInput.addEventListener('change', hitungUsia);
        // Hitung otomatis jika sudah ada value (misal di edit form)
        if (tglLahirInput.value) {
            hitungUsia();
        }
    }
});
</script>