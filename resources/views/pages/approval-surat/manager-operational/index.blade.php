@extends('layouts.master')


@section('title', 'Manager Operational')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Permintaan Units</h1>
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
                        <th class="text-center" width="23%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nomorSuratTerverfikasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td class="text-center">
                                @if ($item->manager_operational_approve == 'Terverifikasi oleh Manager Operational')
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Disetujui</span>
                                    @else
                                        <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                    @endif

                            </td>
                            <td class="text-center">
                                <a href="{{ route('manager-operational.show', $item->id) }}" class="btn btn-dark btn-sm"> <i class="fas fa-eye"></i> Detail Permintaan</a>
                               
                                <!-- Form untuk approve -->
                                <form action="{{ route('approve_surat.operational', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Setujui</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection