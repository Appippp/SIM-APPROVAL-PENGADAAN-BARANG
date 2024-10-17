@extends('layouts.master')

@section('title', 'Permission')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permissions</h1>
    </div>

    {{-- table permission --}}
    @can('table-permission')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Permissions</h6>
                {{-- tambah permission --}}
                @can('tambah-permission')
                    <a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm">Tambah Data</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Permission</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">

                                {{-- ubah permission --}}
                                @can('ubah-permission')
                                    <a href="{{ route('permissions.edit', $item->id) }}" class="btn btn-outline-warning btn-sm mr-2"> <i class="fa fa-pencil"></i> Edit </a>
                                @endcan

                                {{-- hapus permission --}}
                                @can('hapus-permission')
                                    <button class="btn btn-outline-danger btn-sm " onclick="deletePermission({{ $item->id }})">Delete</button>   
                                    <form id="deleteForm{{ $item->id }}" action="{{ route('permissions.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan
                                        
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endcan
@endsection