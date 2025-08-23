<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PegawaiController extends Controller
{
    public function index()
    {
        $pendidikanOrder = "FIELD(tingkat_pendidikan, 'S3','S2','S1','D3','D2','D1','SLTA','SLTP','SD')";
        $pangkatOrder = "FIELD(pangkat, 
            'Pembina Utama',
            'Pembina Madya',
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
        )";

        $pegawais = Pegawai::orderByRaw($pangkatOrder)
            ->orderByDesc('jabatan')
            ->orderByRaw('(masa_kerja_tahun * 12 + masa_kerja_bulan) DESC')
            ->orderByRaw($pendidikanOrder)
            ->orderByDesc('usia')
            ->get();

        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nip' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'masa_kerja_tahun' => 'required|integer|min:0',
            'masa_kerja_bulan' => 'required|integer|min:0|max:11',
            'status_kepegawaian' => 'required|string',
            'nama_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:' . date('Y'),
            'tingkat_pendidikan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|integer|min:0',
            'tempat_tugas' => 'required|string|max:255',
            'nomor_seri_karpeg' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        Pegawai::create($validated);

        return redirect()->route('pegawais.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nip' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'masa_kerja_tahun' => 'required|integer|min:0',
            'masa_kerja_bulan' => 'required|integer|min:0|max:11',
            'status_kepegawaian' => 'required|string',
            'nama_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:' . date('Y'),
            'tingkat_pendidikan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|integer|min:0',
            'tempat_tugas' => 'required|string|max:255',
            'nomor_seri_karpeg' => 'required|string|max:255',
        ]);

        $validated['user_id'] = $pegawai->user_id ?? Auth::id();
        $pegawai->update($validated);

        return redirect()->route('pegawais.index')->with('success', 'Data pegawai berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawais.index')->with('success', 'Data pegawai berhasil dihapus.');
    }

    public function exportExcel()
    {
        return Excel::download(new PegawaiExport, 'pegawais.xlsx');
    }

    public function exportPdf()
    {
        $pegawais = Pegawai::all();
        $pdf = PDF::loadView('pegawai.pdf', compact('pegawais'));
        return $pdf->download('pegawais.pdf');
    }

    public function show($id)
    {
        $pegawai = \App\Models\Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }
}