@extends('layouts.master')


@section('title', 'Permintaan Units')

@section('content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Permintaan Units</h1>
</div>

@can('table-permintaan')
    <div class="card">
        <div class="card-body">
            
            <div>
                @can('tambah-permintaan')
                    <a href="{{ route('unit-permintaan.create') }}" class="btn btn-success btn-sm mb-4" > <i class="fa fa-plus"></i> Tambah Data</a>
                @endcan
            </div>

            <div class="table-resposive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td class="text-center">
                                    @if ($item->manager_klinik_approve == 'Terverifikasi oleh Manager Klinik')
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Terverfikasi oleh Manager Klinik</span>
                                    @else
                                        <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-dark btn-sm" data-target="#detailModal-{{ $item->id }}" data-toggle="modal"><i class="fas fa-eye"></i> Show </a>
                                    {{-- <form action="#" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="fas fa-trash"></i> Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endcan


@endsection

@foreach ($surat as $item)
    <!-- Modal untuk detail data permintaan -->
    <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>
                                        @if ($item->manager_klinik_approve == 'Approved by Manager Klinik')
                                        <span class="badge badge-success"> <i class="fas fa-check"></i> Approved</span>
                                        @elseif ($item->manager_klinik_approve == 'Pending')
                                            <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                                        @elseif ($item->manager_klinik_approve == 'Rejected by Manager Klinik')
                                            <span class="badge badge-danger"> <i class="fas fa-times"></i> Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->keterangan_rejected }}</td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
