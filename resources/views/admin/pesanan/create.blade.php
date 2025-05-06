@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Pesanan</h5>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('pesanan.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="pelanggan_id" class="form-label">Pelanggan</label>
                        <select class="form-select form-select-2 @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" id="pelanggan_id" placeholder="Pilih Pelanggan">
                            <option value="">Pilih Pelanggan</option>
                            @foreach ($pelanggan as $item)
                                <option value="{{ $item->id }}" {{ old('pelanggan_id') == $item ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="paket_id" class="form-label">Paket</label>
                        <select class="form-select form-select-2 @error('paket_id') is-invalid @enderror" name="paket_id" id="paket_id" placeholder="Pilih Paket" onchange="hitungTotalHarga()">
                            <option value="">Pilih Paket</option>
                            @foreach ($paket as $item)
                                <option value="{{ $item->id }}" {{ old('paket_id') == $item ? 'selected' : '' }} data-harga="{{ $item->harga_paket }}">
                                    {{ $item->nama_paket }} (Rp {{ number_format($item->harga_paket, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('paket_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="text" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Berat (Kg)" name="berat" value="{{ old('berat') }}" oninput="hitungTotalHarga()">
                        @error('berat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total</label>
                        <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" placeholder="Total Harga" name="total_harga" value="{{ old('total_harga') }}" readonly>
                        @error('total_harga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-outline-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function hitungTotalHarga(){
            const berat = document.getElementById('berat').value;  // Perbaikan "documnet" menjadi "document"
            const paket = document.getElementById('paket_id');  // Perbaikan "documnet" menjadi "document"
            const hargaPaket = paket.options[paket.selectedIndex].getAttribute('data-harga');  // Perbaikan "SelectedIndex" menjadi "selectedIndex"

            if (berat && hargaPaket) {
                const totalHarga = berat * hargaPaket;
                console.log(totalHarga);
                document.getElementById('total_harga').value = formatRupiah(totalHarga.toString());
            } else {
                document.getElementById('total_harga').value = '';
            }
        }

        function formatRupiah(angka){
            const parameter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            });
            return parameter.format(angka.replace(/[^0-9]/g, ''));
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.form-select-2').select2();
        });
    </script>
@endsection