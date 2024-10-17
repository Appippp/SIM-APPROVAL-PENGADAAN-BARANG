@extends('layouts.master')

@section('title', 'Role Permissions')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role : {{ $role->name }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.addPermissionToRole', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    @foreach ($permissions as $item)
                        <div class="col-md-3">
                            <label>
                                {{-- <input  class="form-control" id="exampleInputEmail1" type="checkbox" aria-describedby="emailHelp" placeholder="Masukkan Nama Permission"> --}}
                                <input name="permission[]" value="{{ $item->name }}"
                                    {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }} type="checkbox">
                                <span class="label-text badge badge-dark ml-3">{{ $item->name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm">Kembali</a>
            </form>
        </div>
    </div>
@endsection
