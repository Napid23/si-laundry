@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Ubah Paket</h5>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('paket.update', $paket->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_paket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}">
                        @error('nama_paket')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_paket" class="form-label">Harga Paket</label>
                        <input type="text" class="form-control @error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Harga Paket" name="harga_paket" value="{{ old('harga_paket', $paket->harga_paket) }}">
                        @error('harga_paket')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('paket.index') }}" class="btn btn-outline-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        document.getElementById('harga_paket').addEventListener('keyup', function(){
            let harga = this.value;
            this.value = formatRupiah(harga);
        });

        function formatRupiah(angka){
            const parameter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            });
            return parameter.format(angka.replace(/[^0-9]/g, ''));
        }
    </script>
@endsection



