<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KepalaBidang extends Controller
{
    public function index()
    {
        $nomorSuratTerverfikasi = Surat::where('admin_updated', 'Telah diupdate oleh Admin')->get();
    
        foreach ($nomorSuratTerverfikasi as $surat) {
            $surat->tanggal = Carbon::parse($surat->tanggal)->format('d F Y');
        }

        return view('pages.approval-surat.kepala-bidang.index', compact('nomorSuratTerverfikasi'));
    }


    public function edit($id)
    {
        $nomorSurat = Surat::findOrFail($id);
        $unit = Unit::get();
        $kategori = Kategori::get();
        $barang = Barang::where('surat_id', $nomorSurat->id)
        ->where('admin_updated', 'Telah diupdate oleh Admin')
        ->get();

        return view('pages.approval-surat.kepala-bidang.edit', compact('nomorSurat', 'unit', 'kategori', 'barang'));
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
            'merk.*'  => 'nullable|string|max:255',
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
            'kepala_bidang_approve' => 'Approved by Kepala Bidang',
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
                'untuk' => $request->untuk[$key] ?? '-',
                'keterangan' => $request->keterangan[$key] ?? '-',
                'admin_updated' => 'Telah diupdate oleh Admin',
                'kepala_bidang_approve' => 'Approved by Kepala Bidang',
                'manager_klinik_approve' => 'Approved by Manager Klinik', // Tetap set status ke 'Approved by Manager Klinik'
                'surat_id' => $nomorSurat->id,
            ]);
        }
    
        // Redirect atau response sesuai kebutuhan
        return redirect()->route('kepala-bidang.index')->with('success', 'Data Surat Permintaan berhasil diperbarui.');

    }

}
