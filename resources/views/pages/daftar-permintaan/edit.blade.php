@extends('layouts.master')

@section('title', 'Edit Permintaan')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary-800">Edit Permintaan</h1>
</div>

<form action="{{ route('daftar-permintaan.update', $nomorSurat->id) }}" method="POST">
    @csrf
    @method('PUT')

  

    
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-row">
                <!-- Nomor Surat -->
                <div class="form-group col-md-3">
                    <label for="name1">Nomor Surat :</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ $nomorSurat->nomor_surat }}"  placeholder="Masukkan Nomor Surat" > 
                </div>
        
                <!-- Tanggal -->
                <div class="form-group col-md-3">
                    <label for="name2">Tanggal :</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $nomorSurat->tanggal }}">
                </div>
        
                <!-- Units -->                
                <div class="form-group col-md-3">
                    <label for="name3">Units:</label>
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">Pilih Units</option>
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $nomorSurat->unit_id ? 'selected' : '' }}>
                                {{ $item->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>
        
                <!-- Kategori -->
                <div class="form-group col-md-3">
                    <label for="name4">Kategori:</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $nomorSurat->kategori_id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>       
            </div>
            
            <hr>
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Untuk</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><input type="text" name="nama_barang[]" class="form-control" value="{{ $item->nama_barang }}" placeholder="Masukkan Nama Barang" /></td>
                        <td><input type="text" name="merk[]" class="form-control" value="{{ $item->merk ?? '' }}" placeholder="Masukkan Merk"  /></td>
                        <td><input type="text" name="satuan[]" class="form-control" value="{{ $item->satuan }}" placeholder="Masukkan Satuan"  /></td>
                        <td><input type="number" name="stok[]" class="form-control" value="{{ $item->stok }}" placeholder="Masukkan Jumlah Stok" min="0" /></td>
                        <td><input type="number" name="jumlah[]" class="form-control" value="{{ $item->jumlah }}" placeholder="Masukkan Jumlah" min="0"/></td>
                        <td><input type="text" name="untuk[]" class="form-control" value="{{ $item->untuk }}" placeholder="Masukkan Untuk" /></td>
                        <td><input type="text" name="keterangan[]" class="form-control" value="{{ $item->keterangan ?? '-' }}" placeholder="Masukkan Keterangan"/></td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3"> <i class="fa fa-save"></i> Simpan Perubahan</button>
            <a href="{{ route('daftar-permintaan.index') }}" class="btn btn-danger mt-3"> <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</form>

@endsection

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var i = {{ count($barang) }}; // Menetapkan nilai awal i dengan jumlah baris barang yang sudah ada
        $('.add-row').click(function() {
            i++;
            $('#table tbody').append(
                `<tr>
                    <td>${i}</td>
                    <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" /></td>
                    <td><input type="text" name="merk[]" class="form-control" placeholder="Masukkan Merk"  /></td>
                    <td><input type="text" name="satuan[]" class="form-control" placeholder="Masukkan Satuan"  /></td>
                    <td><input type="number" name="stok[]" class="form-control" placeholder="Masukkan Jumlah Stok" min="0" /></td>
                    <td><input type="number" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" min="0"/></td>
                    <td><input type="text" name="keterangan[]" class="form-control" placeholder="Masukkan Keterangan"/></td>
                    <td><button type="button" class="btn btn-danger btn-sm mt-2 remove-row"><i class="fa fa-minus"></i></button></td>
                </tr>`
            );
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        var i = {{ count($barang) }}; // Menetapkan nilai awal i dengan jumlah baris barang yang sudah ada
        $('.add-row').click(function() {
            i++;
            var newRow = `
                <tr>
                    <td>${i}</td>
                    <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" /></td>
                    <td><input type="text" name="merk[]" class="form-control" placeholder="Masukkan Merk"  /></td>
                    <td><input type="text" name="satuan[]" class="form-control" placeholder="Masukkan Satuan"  /></td>
                    <td><input type="number" name="stok[]" class="form-control" placeholder="Masukkan Jumlah Stok" min="0" /></td>
                    <td><input type="number" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" min="0"/></td>
                    <td><input type="text" name="keterangan[]" class="form-control" placeholder="Masukkan Keterangan"/></td>
                    <td><button type="button" class="btn btn-danger btn-sm mt-2 remove-row"><i class="fa fa-minus"></i></button></td>
                </tr>`;
            $('#table tbody').append(newRow);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            // Update nomor urut setelah menghapus baris
            updateRowNumbers();
        });

        function updateRowNumbers() {
            $('#table tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });
</script> --}}


