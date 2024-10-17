
@extends('layouts.master')


@section('title', 'Detail Permintaan Unit')


@section('content')

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Permintaan Unit</h1>
</div>

<div class="card">
    <div class="card-body">
        <p><strong>Nomor Surat:</strong> {{ $nomorSurat->nomor_surat }}</p>
        <p><strong>Tanggal:</strong> {{ $nomorSurat->tanggal }}</p>
        <p><strong>Unit:</strong> {{ $nomorSurat->unit->nama_unit }}</p>
        <p><strong>Kategori:</strong> {{ $nomorSurat->kategori ? $nomorSurat->kategori->nama_kategori : '-' }}</p>
    </div>
</div>


<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as  $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                        <td class="text-center"> 
                            @if ($item->manager_klinik_approve == 'Approved by Manager Klinik')
                            <span class="badge badge-success"> <i class="fas fa-check"></i> Approved</span>
                            @elseif ($item->manager_klinik_approve == 'Pending')
                                <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                            @elseif ($item->manager_klinik_approve == 'Rejected by Manager Klinik')
                                <span class="badge badge-danger"> <i class="fas fa-times"></i> Rejected</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Form untuk approve -->
                            <form action="{{ route('approve_barang', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Approve</button>
                            </form>
                            <!-- Form untuk reject -->
                            <form action="{{ route('reject_barang', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-times"></i> Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('manager-klinik.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Simpan</a>
    </div>
</div>
    
@endsection