<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SuratPermintaanUnit extends Controller
{
    public function index()
    {
        $nomorSuratTerverifikasi = Surat::where('manager_klinik_approve', 'Terverifikasi oleh Manager Klinik')->get();

        foreach ($nomorSuratTerverifikasi as $surat) {
            $surat->tanggal = Carbon::parse($surat->tanggal)->format('d F Y');
        }

        return view('pages.cetak-surat.surat-permintaan-unit.index', compact('nomorSuratTerverifikasi'));
    }

    public function cetakPdf($id)
    {
        // Memuat data surat yang telah disetujui oleh manajer klinik
        $nomorSurat = Surat::where('manager_klinik_approve', 'Terverifikasi oleh Manager Klinik')->findOrFail($id);
    
        // Memuat data barang yang terkait dengan surat tersebut
        $barang = Barang::where('surat_id', $nomorSurat->id)
                        ->where('manager_klinik_approve', 'Approved by Manager Klinik')
                        ->get();
    
        // Mengubah format tanggal menjadi 'Y-m-d' (format yang diterima oleh MySQL)
        $nomorSurat->tanggal = Carbon::parse($nomorSurat->tanggal)->format('Y-m-d');
    
        // Memuat data unit dan kategori
        $unit = Unit::findOrFail($nomorSurat->unit_id);
        $kategori = Kategori::find($nomorSurat->kategori_id);
        
        // Membuat objek Dompdf
        $pdf = new Dompdf();
    
        $imagePath = public_path('app/public/signatures/');
    
        // Menyiapkan data untuk ditampilkan dalam view PDF
        $data = [
            'nomorSurat' => $nomorSurat,
            'unit' => $unit,
            'kategori' => $kategori,
            'barang' => $barang,
        ];
        $data['imagePath'] = public_path('storage/signatures/'.$nomorSurat->tanda_tangan);
    
        // Memuat view PDF dengan data yang telah disiapkan
        $pdf->loadHtml(view('pages.cetak-surat.surat-permintaan-unit.pdf', $data));
    
        // Mengatur ukuran kertas
        $pdf->setPaper('A4', 'portrait');
    
        // Membuat dan menampilkan PDF
        $pdf->render();
    
        // Update status cetak
        $nomorSurat->update(['surat_permintaan' => now()->format('d-m-Y H:i:s')]);
    
        return $pdf->stream('Surat Permintaan'. '-' . $nomorSurat->unit->nama_unit .'.pdf');

        return redirect()->back()->with('success', 'Barang berhasil disetujui.');
    }
    
    

    

    
   



}
