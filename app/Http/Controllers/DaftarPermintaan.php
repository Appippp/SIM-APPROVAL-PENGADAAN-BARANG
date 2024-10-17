<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DaftarPermintaan extends Controller
{
    public function index()
    {
        $nomorSuratTerverfikasi = Surat::where('manager_klinik_approve', 'Terverifikasi oleh Manager Klinik')->get();
        

        foreach ($nomorSuratTerverfikasi as $surat) {
            $surat->tanggal = Carbon::parse($surat->tanggal)->format('d F Y');
        }

        return view('pages.daftar-permintaan.index', compact('nomorSuratTerverfikasi'));
    }

    public function edit(string $id)
    {
        $nomorSurat = Surat::findOrFail($id);
        $unit = Unit::get();
        $kategori = Kategori::get();
        $barang = Barang::where('surat_id', $nomorSurat->id)
        ->where('manager_klinik_approve', 'Approved by Manager Klinik')
        ->get();

        return view('pages.daftar-permintaan.edit', compact('nomorSurat', 'unit', 'kategori', 'barang'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal' => 'required|date',
            'unit_id' => 'required|exists:unit,id',
            'kategori_id' => 'nullable|exists:kategori,id',
            'nama_barang.*' => 'required|string',
            'merk.*'  => 'nullable|string',
            'satuan.*' => 'required|string',
            'stok.*' => 'required|integer',
            'jumlah.*' => 'required|integer',
            'untuk.*' => 'nullable|string',
            'keterangan.*' => 'nullable|string',
        ]);
    
        // Cari nomor surat yang akan diupdate
        $nomorSurat = Surat::findOrFail($id);
        
        // Update nomor surat
        $nomorSurat->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'unit_id' => $request->unit_id,
            'kategori_id' => $request->kategori_id,
            'admin_updated' => 'Telah diupdate oleh Admin', 
            'manager_klinik_approve' => 'Terverifikasi oleh Manager Klinik', // Tetap set status ke 'Approved by Manager Klinik'
        ]);
    
        // Hapus barang lama
        $nomorSurat->barang()->delete();
    
        // Simpan detail barang-barang yang baru
        foreach ($request->nama_barang as $key => $nama_barang) {
            Barang::create([
                'nama_barang' => $nama_barang,
                'merk' => $request->merk[$key] ?? '-',
                'satuan' => $request->satuan[$key],
                'stok' => $request->stok[$key],
                'jumlah' => $request->jumlah[$key],
                'keterangan' => $request->keterangan[$key] ?? '-',
                'untuk' => $request->untuk[$key] ?? '-',
                'admin_updated' => 'Telah diupdate oleh Admin',
                'manager_klinik_approve' => 'Approved by Manager Klinik', // Tetap set status ke 'Approved by Manager Klinik'
                'surat_id' => $nomorSurat->id,
            ]);
        }
    
        // Redirect atau response sesuai kebutuhan
        return redirect()->route('daftar-permintaan.index')->with('success', 'Data Surat Permintaan berhasil diperbarui.');
    }
    
}
