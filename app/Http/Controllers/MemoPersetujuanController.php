<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MemoPersetujuanController extends Controller
{
    public function index()
    {
        $nomorSuratTerverifikasi = Surat::where('direktur_approve', 'Terverifikasi oleh Direktur')->get();

        foreach ($nomorSuratTerverifikasi as $surat) {
            $surat->tanggal = Carbon::parse($surat->tanggal)->format('d F Y');
        }
        return view('pages.cetak-surat.memo-persetujuan.index', compact('nomorSuratTerverifikasi'));
    }

    public function cetakPdf($id)
    {
        // Memuat data surat yang telah disetujui oleh manajer klinik
        $nomorSurat = Surat::where('direktur_approve', 'Terverifikasi oleh Direktur')->findOrFail($id);
    
        // Memuat data barang yang terkait dengan surat tersebut
        $barang = Barang::where('surat_id', $nomorSurat->id)
                        ->where('kepala_bidang_approve', 'Approved by Kepala Bidang')
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
        $pdf->loadHtml(view('pages.cetak-surat.memo-persetujuan.pdf', $data));
    
        // Menyimpan PDF ke direktori public
        $pdf->render();

        $nomorSurat->update(['memo_persetujuan' => now()->format('d-m-Y H:i:s')]);
    
        return $pdf->stream('MEMO PERSETUJUAN'. '-' . $nomorSurat->unit->nama_unit .'.pdf');
    }
}
