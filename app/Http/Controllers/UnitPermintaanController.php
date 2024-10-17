<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Surat;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitPermintaanController extends Controller
{
    public function index()
    {
        // Jika bukan admin, ambil data yang sesuai dengan pengguna yang login
        $userId = Auth::id() ;

        // mengambil data surat sesuai dengan yang login
        $surat = Surat::where('user_id', $userId)->get();

         foreach ($surat as $item) {
            $item->tanggal = Carbon::parse($item->tanggal)->format('d F Y');
        }

        $barang = Barang::WhereIn('surat_id', $surat->pluck('id'))
                        // ->WhereIn('manager_klinik_approved', ['Approved', 'Rejected'])
                        ->get();



        return view('pages.unit-permintaan.index', compact('surat', 'barang'));
    }


    public function create()
    {
        $unit = Unit::get();
        $kategori = Kategori::get();
        return view('pages.unit-permintaan.create', compact('unit', 'kategori'));
    }

  

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_surat' => 'required|string|unique:surat,nomor_surat,',
            'tanggal' => 'required|date',
            'tanda_tangan' => 'nullable|string', // Memastikan tanda_tangan adalah string (base64)
            'unit_id' => 'required|exists:unit,id',
            'kategori_id' => 'nullable|exists:kategori,id',
            'nama_barang.*' => 'required|string',
            'satuan.*' => 'required|string',
            'stok.*' => 'nullable|integer',
            'jumlah.*' => 'required|integer',
            'harga.*' => 'nullable|integer',
            'keterangan.*' => 'nullable|string',
            'untuk.*' => 'nullable|string',
            'merk.*' => 'nullable|string',
            'uraian_spesifikasi.*' => 'nullable|string',
            'harga.*' => 'nullable|integer',
            'sub_total.*' => 'nullable|integer',
            'total.*' => 'nullable|integer',
        ]);

        // Ambil id pengguna yang login
        $userId = Auth::id();

        // Inisialisasi variabel untuk tanda tangan

        $tandaTanganBase64 = null;
        
        // Cek apakah tanda tangan dikirimkan
        if ($request->has('tanda_tangan')) {
            $tandaTanganBase64 = $request->tanda_tangan;

           // Decode base64 encoded image
            $image_parts = explode(";base64,", $tandaTanganBase64);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            // Generate file name for the signature image
            $filename = uniqid() . '.' . $image_type;

            // Simpan gambar ke dalam folder storage/app/public/signatures
            $folderPath = storage_path('app/public/signatures/');
            file_put_contents($folderPath . $filename, $image_base64);
        }

        // Simpan nomor surat beserta tanda tangan jika ada
        $nomorSurat = Surat::create([
            'user_id' => $userId,
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'unit_id' => $request->unit_id,
            'kategori_id' => $request->kategori_id,
            'tanda_tangan' => $filename, // Simpan tanda tangan dalam format base64
            
        ]);

        // Simpan detail barang-barang
        foreach ($request->nama_barang as $key => $nama_barang) {
            $barang = new Barang([
                'user_id' => $userId,
                'surat_id' => $nomorSurat->id,
                'merk' => isset($request->merk[$key]) ? $request->merk[$key] : '-',
                'uraian_spesifikasi' => $request->uraian_spesifikasi[$key] ?? '-',
                'nama_barang' => $nama_barang,
                'satuan' => $request->satuan[$key],
                'stok' => $request->stok[$key] ?? 0,
                'jumlah' => $request->jumlah[$key],
                'harga' => $request->harga[$key] ?? 0,
                'keterangan' => $request->keterangan[$key] ?? '-',
                'untuk' => $request->untuk[$key] ?? '-',
                'sub_total' => $request->sub_total[$key] ?? 0,
                'total' => $request->total[$key] ?? 0,
            ]);
            $barang->save();
        }
        return redirect()->route('unit-permintaan.index')->with('success', 'Data unit permintaan berhasil ditambahkan');        
    }

   
    





}
