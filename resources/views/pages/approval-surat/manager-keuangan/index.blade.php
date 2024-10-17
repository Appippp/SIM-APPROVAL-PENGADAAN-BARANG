@extends('layouts.master')


@section('title', 'Manager Keuangan')


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
                                @if ($item->manager_keuangan_approve == 'Terverifikasi oleh Manager Keuangan')
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Terverfikasi</span>
                                @else
                                    <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                @endif

                            </td>
                            <td class="text-center">
                                <a href="{{ route('manager-keuangan.show', $item->id) }}" class="btn btn-dark btn-sm"> <i class="fas fa-eye"></i> Detail Permintaan</a>
                               
                                <!-- Form untuk approve -->
                                <form action="{{ route('approve_surat.keuangan', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Verifikasi</button>
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