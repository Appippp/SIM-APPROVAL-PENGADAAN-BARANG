@extends('layouts.master')

@section('title', 'Roles')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
    </div>

    {{-- table role --}}
    @can('table-role')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Roles</h6>
                {{-- tambah role --}}
                @can('tambah-role')
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm">Tambah Data</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Roles</th>
                                <th class="text-center" width="40%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        {{-- ubah role --}}
                                        @can('ubah-role')
                                            <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>
                                        @endcan

                                        {{-- tambah permission role --}}
                                        @can('tambah-permission-role')
                                            <a href="{{ route('roles.addPermissionToRole', $item->id) }}" class="btn btn-outline-dark btn-sm mr-2"> <i class="fa fa-pencil"></i> Add / Edit Role Permissions </a>
                                        @endcan

                                        {{-- hapus role --}}
                                        @can('hapus-role')
                                            <button class="btn btn-outline-danger btn-sm " onclick="deletePermission({{ $item->id }})">Delete</button>
                                                    
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('roles.destroy', $item->id) }}" method="POST" style="display: inline;">
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