<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ManagerKeuanganController extends Controller
{
    public function index()
    {
        $nomorSuratTerverfikasi = Surat::where('manager_operational_approve', 'Terverifikasi oleh Manager Operational')->get();
    
        foreach ($nomorSuratTerverfikasi as $surat) {
            $surat->tanggal = Carbon::parse($surat->tanggal)->format('d F Y');
        }

        return view('pages.approval-surat.manager-keuangan.index', compact('nomorSuratTerverfikasi'));
    }

    public function show($id)
    {
       // Ambil data nomor surat beserta detail barang-barang terkait
       $nomorSurat = Surat::findOrFail($id);
       $barang = Barang::where('surat_id', $nomorSurat->id)
                       ->where('kepala_bidang_approve', 'Approved by Kepala Bidang')
                       ->get();

       $nomorSurat->tanggal = Carbon::parse($nomorSurat->tanggal)->format('d F Y');

       
       // Load data unit dan kategori
       $unit = Unit::findOrFail($nomorSurat->unit_id);
       $kategori = Kategori::find($nomorSurat->kategori_id);

       return view('pages.approval-surat.manager-keuangan.show', compact('nomorSurat', 'barang', 'unit', 'kategori'));

    }


    public function approveSurat($id)
    {
        // Cari nomor surat berdasarkan ID
        $nomorSurat = Surat::findOrFail($id);

        // Ubah status nomor surat menjadi "disetujui"
        $nomorSurat->update(['manager_keuangan_approve' => 'Terverifikasi oleh Manager Keuangan']);

        // Redirect ke halaman detail permintaan
        return redirect()->back()->with('success', 'Nomor surat berhasil diverifikasi.');
    }
}
