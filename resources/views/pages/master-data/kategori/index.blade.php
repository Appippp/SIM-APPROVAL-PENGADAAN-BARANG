@extends('layouts.master')

@section('title', 'Kategori')

@section('content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        <a href="{{ route('kategoriw.create') }}" class="btn btn-success btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Kategori</th>
                        <th class="text-center" width="40%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($kategori as $item)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td class="text-center">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>

                               <!-- Tambahkan tombol delete -->
                               <button class="btn btn-outline-danger btn-sm " onclick="deletePermission({{ $item->id }})">Delete</button>
                                
                               <form id="deleteForm{{ $item->id }}" action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display: inline;">
                                   @csrf
                                   @method('DELETE')
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