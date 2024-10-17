@extends('layouts.master')

@section('title', 'Daftar Permintaan')

@section('content')

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Permintaan</h1>
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
                        <th class="text-center">Status</th>
                        <th class="text-center">Verifikasi</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nomorSuratTerverfikasi as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nomor_surat }}</td> 
                            <td>{{ $surat->tanggal }}</td>
                            <td class="text-center">
                                @if ($surat->manager_klinik_approve == 'Terverifikasi oleh Manager Klinik')
                                    <span class="badge badge-info"> <i class="fas fa-check"></i> Disetujui oleh Manager Klinik</span>
                                    @else
                                        <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                                    @endif
                            </td>
                            <td class="text-center">
                                @if($surat->admin_updated == 'Pending')
                                    <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending </span>
                                @elseif($surat->admin_updated == 'Telah diupdate oleh Admin')
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Telah diproses </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('daftar-permintaan.edit', $surat->id) }}" class="btn  btn-dark btn-sm"> <i class="fas fa-eye"></i> Detail Permintaan </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>   
@endsection