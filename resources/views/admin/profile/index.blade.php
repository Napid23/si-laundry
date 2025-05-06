@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Form Ubah Profile</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama', $user->nama) }}">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('nama') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    @if(session('status'))
        swal('{{ session('title') }}', '{{ session('message') }}', '{{ session('status') }}')
    @endif
    </script>
@endsection