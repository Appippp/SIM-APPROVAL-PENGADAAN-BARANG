@extends('layouts.master')

@section('title', 'Dashboard')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h6 class="text-muted">Tata Cara Penggunaan Sistem</h6>
                <ol>
                    <li>Unit Masing-masing dapat melakukan permintaan barang pada menu permintaan.
                    </li>
                    <li>Manager Klinik dapat melakukan persetujuan dan penolakan permintaan</li>
                    <li>Admin dapat melakukan membuat permintaan yang di ajukan oleh Unit</li>
                    <li>Kepala Kabid dapat mengetahui permintaan dari Unit</li>
                    <li>Manager Operasional dapat melakukan persetujuan dan penolakan permintaan yang diajukan oleh Unit</li>
                    <li>Manager SDM keuangan dapat mengetahui permintaan yang diajukan oleh kabid</li>
                    <li>Direktur dapat melakukan menyetujui dan penolakan permintaan yang diajukan oleh kabid</li>
                </ol>
            </div>
        </div>
    </div>
</div>   
@endsection