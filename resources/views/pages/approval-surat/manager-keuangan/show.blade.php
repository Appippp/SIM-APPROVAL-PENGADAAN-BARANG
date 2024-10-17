@extends('layouts.master')

@section('title', 'Detail Permintaan Unit')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Permintaan Unit</h1>
    <a href="{{ route('manager-keuangan.index') }}" class="btn btn-danger  "> <i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="card">
    <div class="card-body">

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th colspan="2" style="padding: 10px">
                        <span style="color:black; font-weight: bold; font-size: 14pt"> PT. NUSA LIMA MEDIKA </span>
                        <br>
                        <span style="color: black; font-size: 12pt">Unit : Kantor Pusat</span>
                    </th>

                    <th class="text-center">
                        <span style="color:black; font-weight: bold; font-size: 14pt">MEMO PERSETUJUAN BARANG BARANG</span>
                    </th>
                    <th class="text-center">
                        <span style="color:black; font-size: 12pt">Nomor</span>
                        <br>
                        <span style="color:black; font-size: 12pt">Tanggal</span>
                        <br>
                        <span style="color:black; font-size: 12pt">Unit</span>
                    </th>
                    <th style="padding-left: 4px">
                        <span style="color: black; font-size: 12pt">: {{ $nomorSurat->nomor_surat }}</span>
                        <br>
                        <span style="color: black; font-size: 12pt">: {{ $nomorSurat->tanggal }}</span>
                        <br>
                        <span style="color: black; font-size: 12pt">: {{ $nomorSurat->unit->nama_unit }}</span>
                    </th>
                </tr>
                <tr class="text-center" style="color: black; font-size: 12pt">
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Untuk</th>
                    <th>Satuan</th>
                    <th>Banyaknya</th>
                </tr>
                <tr>
                    <th></th>
                    <th style="padding-left: 5px; font-size: 12pt; color: black">{{ $nomorSurat->kategori->nama_kategori }}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

              @foreach ($barang as $item)
                  <tr style="font-size: 12pt; color: black; text-align: center" >
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align: left">{{ $item->merk }}</td>
                        <td>{{ $item->untuk }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->jumlah }}</td>
                  </tr>
              @endforeach
            </tbody>
            <tfoot>
                <tr style="font-size: 12pt; color: black">
                    <th colspan="2">Kantor Direksi</th>
                    <th class="text-center">No. PB :</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr style="font-size: 12pt; color: black">
                    <th colspan="2">Kantor Direksi</th>
                    <th class="text-center">No. SP : </th>
                    <th></th>
                    <th></th>
                </tr>
                {{-- <tr>
                    <th class="text-center" colspan="2" style=" font-size: 12pt; color: black">Diminta Oleh : </th>
                    <th></th>
                    <th class="text-center" colspan="2" style=" font-size: 12pt; color: black">Disetujui Oleh, </th>
                </tr> --}}

            </tfoot>
        </table>
        
        

    </div>
</div>

@endsection
