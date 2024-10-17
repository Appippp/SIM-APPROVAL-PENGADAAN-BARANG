@extends('layouts.master')

@section('title', 'Permintaan')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary-800">Permintaan</h1>
</div>

<form action="{{ route('unit-permintaan.store') }}" method="POST">
    @csrf

       

    

    <div class="card mt-2 ">
        <div class="card-body shadow">

            <div class="form-row mb-3">
                <!-- Nomor Surat -->
                <div class="form-group col-md-3">
                    <label for="name1">Nomor Surat :</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{old('nomor_surat')}}"  placeholder="Masukkan Nomor Surat">
                    @error('nomor_surat')
                    <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
        
                <!-- Tanggal -->
                <div class="form-group col-md-3">
                    <label for="name2">Tanggal :</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{old('tanggal')}}">
                    @error('tanggal')
                    <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
        
                <!-- Units -->                
                <div class="form-group col-md-3">
                    <label for="name3">Units:</label>
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">Pilih Units</option>
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>
        
                {{-- <!-- Kategori -->
                <div class="form-group col-md-3">
                    <label for="name4">Kategori:</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>        --}}
        
            </div>    
            <hr>


            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" value="{{ old('nama_barang.0') }}" /></td>
                        <td><input type="text" name="satuan[]" class="form-control" placeholder="Masukkan Satuan" value="{{ old('satuan.0') }}" /></td>
                        <td><input type="number" name="stok[]" class="form-control" placeholder="Masukkan Jumlah Stok" min="0" value="{{ old('stok.0') }}" /></td>
                        <td><input type="number" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" min="0" value="{{ old('jumlah.0') }}" /></td>
                        <td><input type="text" name="keterangan[]" class="form-control" placeholder="Masukkan Keterangan" value="{{ old('keterangan.0') }}" /></td>
                        <td><button type="button" class="btn btn-success btn-sm mt-2 add-row"><i class="fa fa-plus"></i></button></td>
                    </tr>                    
                </tbody>
            </table>
            <hr>

            <div class="col-md-12 mt-3" >
                <label> Tanda Tangan :</label>
                <br/>
                <div id="sig"></div>
                <br/><br/>
                <button id="clear" class="btn btn-danger btn-sm" >  Clear</button>
                <textarea id="signature" name="tanda_tangan" style="display: none" ></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3"> <i class="fa fa-save"></i> Submit</button>
            <a href="{{ route('unit-permintaan.index') }}" class="btn btn-danger mt-3"> <i class="fa fa-arrow-left"></i> Kembali</a>

        </div>
    </div>


           
    


    
    
</form>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var i = 1;
        $('.add-row').click(function() {
            i++;
            $('#table tbody').append(
                `<tr>
                    <td>${i}</td>
                    <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Masukkan Nama Barang" /></td>
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
</script>


