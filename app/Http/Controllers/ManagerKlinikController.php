<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ManagerKlinikController extends Controller
{
    public function index()
    {
        $surat = Surat::all();

        foreach ($surat as $item) {
            $item->tanggal = Carbon::parse($item->tanggal)->format('d F Y');
        }

        return view('pages.manager-klinik.index', compact('surat'));
    }

    public function show($id)
    {
       // Ambil data nomor surat beserta detail barang-barang terkait
       $nomorSurat = Surat::findOrFail($id);
       $barang = Barang::where('surat_id', $nomorSurat->id)->get();

       $nomorSurat->tanggal = Carbon::parse($nomorSurat->tanggal)->format('d F Y');

       
       // Load data unit dan kategori
       $unit = Unit::findOrFail($nomorSurat->unit_id);
       $kategori = Kategori::find($nomorSurat->kategori_id);

       return view('pages.manager-klinik.show', compact('nomorSurat', 'barang', 'unit', 'kategori'));

    }

    public function approveBarang($id)
    {
        // Cari barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Ubah status barang menjadi "disetujui"
        $barang->update(['manager_klinik_approve' => 'Approved by Manager Klinik']);

        // Redirect ke halaman detail permintaan
        return redirect()->back()->with('success', 'Barang berhasil disetujui.');
    }

    /**
     * Menolak barang.
     */
    public function rejectBarang($id)
    {
        // Cari barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Ubah status barang menjadi "ditolak"
        $barang->update(['manager_klinik_approve' => 'Rejected by Manager Klinik']);

        // Redirect ke halaman detail permintaan
        return redirect()->back()->with('success', 'Barang berhasil ditolak.');
    }

    public function approveSurat($id)
    {
        // Cari nomor surat berdasarkan ID
        $nomorSurat = Surat::findOrFail($id);

        // Ubah status nomor surat menjadi "disetujui"
        $nomorSurat->update(['manager_klinik_approve' => 'Terverifikasi oleh Manager Klinik']);

        // Redirect ke halaman detail permintaan
        return redirect()->back()->with('success', 'Nomor surat berhasil diverifikasi.');
    }
}
