@extends('layouts.master')

@section('title', 'Users')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    {{-- Tambah user --}}
    @can('table-user')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>

                {{-- tambah user --}}
                @can('tambah-user')        
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Tambah Data</a>  
                @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Roles</th>
                                <th>Foto</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>
                                        @if (!empty($item->getRoleNames()))
                                            @foreach ($item->getRoleNames() as $rolename)
                                                <label class="badge badge-pill badge-info">{{ $rolename }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->foto)
                                        <img src="{{ asset('storage/foto_user/' . $item->foto) }}"  width="70">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        {{-- ubah user --}}
                                        @can('ubah-user')    
                                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>
                                        @endcan
                                        
                                        {{-- hapus user --}}
                                        @can('hapus-user')
                                            <button class="btn btn-outline-danger btn-sm " onclick="deletePermission({{ $item->id }})">Delete</button>
                                            
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline;">
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