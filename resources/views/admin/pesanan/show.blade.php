@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Detail Pesanan</h5>
            <div class="d-flex mb-4">
                <table class="table table-borderless">
                    <tr>
                        <td class="fw-semibold">No Invoice</td>
                        <td>:</td>
                        <td>{{ $pesanan->no_invoice }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Pelanggan</td>
                        <td>:</td>
                        <td>{{ $pesanan->pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Paket</td>
                        <td>:</td>
                        <td>{{ $pesanan->paket->nama_paket }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Berat (kg) x Harga Paket</td>
                        <td>:</td>
                        <td>{{ $pesanan->berat }} x Rp {{ number_format($pesanan->paket->harga_paket, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Total Harga</td>
                        <td>:</td>
                        <td> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Status Pesanan</td>
                        <td>:</td>
                        <td>{{ $pesanan->status }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal Pesanan</td>
                        <td>:</td>
                        <td>{{ $pesanan->tanggal_pesanan }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal Proses</td>
                        <td>:</td>
                        <td>{{ $pesanan->tanggal_proses }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal Selesai</td>
                        <td>:</td>
                        <td>{{ $pesanan->tanggal_selesai }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal Diterima</td>
                        <td>:</td>
                        <td>{{ $pesanan->tanggal_diterima }}</td>
                    </tr>
                </table>
            </div>
            <div class="d-flex">
                <a href="{{ route('pesanan.index') }}" class="btn btn-outline-primary">Kembali</a>
                <form action="{{ route('pesanan.update', $pesanan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if ($pesanan->status == 'Selesai')
                        <button type="submit" class="btn btn-primary ms-2">Pesanan Sudah Diterima</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection