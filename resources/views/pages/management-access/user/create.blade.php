@extends('layouts.master')

@section('title', 'Users')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Masukkan Nama Role">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <small>{{ $message }}</small>
                </span>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="Username">Username:</label>
                <input type="text" name="email" id="name" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Masukkan Username">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" name="password" id="name" class="form-control  @error('password') is-invalid @enderror"  placeholder="Masukkan Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Jabatan:</label>
                <input type="text" name="jabatan" id="name" class="form-control  @error('jabatan') is-invalid @enderror" value="{{old('jabatan')}}" placeholder="Masukkan Jabatan">
                @error('jabatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="name">Roles:</label>
                <select name="roles[]" class="form-control @error('roles[]') is-invalid @enderror" aria-label="Default select example" value="{{old('roles[]')}}">
                    <option value="">Select Role</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                </select>
                @error('roles[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Foto</label>
                <input name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" type="file" accept="image/*" onchange="preview('.tampil-foto', this.files[0], 300)">
                <small class="text-muted">Maximum file size: 2 MB</small>
                @error('foto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">Kembali</a>
        </form>
    </div>
</div>

@endsection
