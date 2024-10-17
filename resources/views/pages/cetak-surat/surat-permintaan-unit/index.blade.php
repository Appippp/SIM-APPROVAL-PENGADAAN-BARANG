@extends('layouts.master')

@section('title', 'Surat Permintaan')

@section('content')

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Surat Permintaan</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th class="text-center">Disetujui</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nomorSuratTerverifikasi as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nomor_surat }}</td> 
                            <td>{{ $surat->tanggal }}</td>
                            <td class="text-center">
                                @if ($surat->manager_klinik_approve == 'Terverifikasi oleh Manager Klinik')
                                    <span class="badge badge-warning"> <i class="fas fa-check"></i> Disetujui oleh Manager Klinik</span>
                                @endif
                            </td>
                            <td>
                             {{ $surat->surat_permintaan }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('surat-permintaan-unit.pdf', ['id' => $surat->id]) }}" class="btn btn-info btn-sm"> <i class="fas fa-print"></i> Print </a>                         
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
    
@endsection


