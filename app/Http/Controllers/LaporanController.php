<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk menghapus file di storage

class LaporanController extends Controller
{
    // READ: daftar laporan (petugas), 5 data per halaman
    public function index()
{
    $laporans = Laporan::latest()->paginate(5);
    $ringkasan = [
        'Menunggu' => Laporan::where('status', 'Menunggu')->count(),
        'Diproses' => Laporan::where('status', 'Diproses')->count(),
        'Selesai'  => Laporan::where('status', 'Selesai')->count(),
    ];

    return view('laporans.index', compact('laporans', 'ringkasan'));
}

    // CREATE: form pelaporan untuk warga
    public function create()
    {
        return view('laporans.create');
    }

    // CREATE: validasi dan simpan laporan baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|regex:/^[0-9+]{8,15}$/',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:100',
            'tinggi_air'   => 'required|integer|min:1|max:1000',
            'keterangan'   => 'nullable|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048', // maks. 2 MB
        ]);

        // Simpan foto ke storage/app/public/laporan, lalu ganti isinya dengan path
        $data['foto'] = $request->file('foto')->store('laporan', 'public');

        Laporan::create($data); // status otomatis 'Menunggu'

        return redirect()->route('laporans.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih atas partisipasi Anda.');
    }

    // READ: detail satu laporan
    public function show(Laporan $laporan)
    {
        return view('laporans.show', compact('laporan'));
    }

    // UPDATE: form edit laporan
    public function edit(Laporan $laporan)
    {
        return view('laporans.edit', compact('laporan'));
    }

    // UPDATE: simpan perubahan (foto baru bersifat opsional)
    public function update(Request $request, Laporan $laporan)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|regex:/^[0-9+]{8,15}$/',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:100',
            'tinggi_air'   => 'required|integer|min:1|max:1000',
            'keterangan'   => 'nullable|string',
            'status'       => 'required|in:Menunggu,Diproses,Selesai',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {                         // Jika ada foto baru
            Storage::disk('public')->delete($laporan->foto);     // Hapus foto lama
            $data['foto'] = $request->file('foto')->store('laporan', 'public');
        } else {
            unset($data['foto']);                                // Pertahankan foto lama
        }

        $laporan->update($data);

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    // DELETE: hapus foto di storage dan data di database
    public function destroy(Laporan $laporan)
    {
        Storage::disk('public')->delete($laporan->foto); // Hapus file fisik
        $laporan->delete();                              // Hapus data di tabel

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}