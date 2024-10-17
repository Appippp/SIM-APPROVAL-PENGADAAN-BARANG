@extends('layouts.master')

@section('title', 'Memo Persetujuan')

@section('content')

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Memo Persetujuan</h1>
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
                                @if ($surat->direktur_approve == 'Terverifikasi oleh Direktur')
                                    <span class="badge badge-warning"> <i class="fas fa-check"></i> Disetujui oleh Direktur</span>
                                @endif
                            </td>
                            <td>
                               <span class="badge badge-info">{{ $surat->memo_persetujuan }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('memo-persetujuan.pdf', ['id' => $surat->id]) }}" class="btn btn-info btn-sm"> <i class="fas fa-print"></i> Print </a>
                                                          
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
    
@endsection


