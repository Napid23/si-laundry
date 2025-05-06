@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Pengguna</h5>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('pengguna.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select @error('level') is-invalid @enderror" name="level" id="level" placeholder="Level">
                            <option value="">Pilih Level</option>
                            @foreach ($level as $item)
                                <option value="{{ $item }}" {{ old('level') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('level')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pengguna.index') }}" class="btn btn-outline-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection