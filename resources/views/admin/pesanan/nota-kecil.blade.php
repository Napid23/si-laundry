<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print - Nota Kecil - SI Laundry</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('template-admin/src/assets/images/logos/favicon.png') }}"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 6px;
        }
        
        img {
            max-width: 100%;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .alamat {
            padding: 8px 0px;
            display: flex;
            text-align: center;
            flex-direction: column;
            gap: 4px;
        }
        
        .padding-tb-2 {
            padding: 2px 0px;
        }
        
        .fs-10-fw-bold {
            font-size: 10px;
            font-weight: bold;
        }
        </style>
        
</head>
<body>
    <img src="{{ asset('template-admin/src/assets/images/logos/dark-logo.svg') }}" alt="">
    <div class="alamat">
        <a> Laundry</a>
        <a>Dsn. JL. Jogodayoh Jabon, RT.05/RW.2, Jodokadoy, Kec. Mojokaryar, Kabupaten Mojokerto, Jawa Timur 61364</a>
        <a>0821-4005-171</a>
    </div>

    <table>
        <tr>
            <td>No Nota</td>
            <td align="right">{{ $pesanan->no_invoice }}</td>
        </tr>
        <tr>
            <td>Creator</td>
            <td align="right">{{ $pesanan->creator->name }}</td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td align="right">{{ $pesanan->pelanggan->nama }}</td>
        </tr>
        <tr>
            <td>Status Pesanan</td>
            <td align="right">{{ $pesanan->status }}</td>
        </tr>
        <tr class="padding-tb-2" colspan="2">
            <td colspan="2">{{ $pesanan->paket->nama_paket }}</td>
        </tr>
        <tr>
            <td>{{ $pesanan->berat }} Kg x {{ 'Rp ' . number_format($pesanan->paket->harga_paket, 0, ',', '.') }}</td>
            <td align="right">{{ 'Rp ' . number_format($pesanan->total_harga, 0, ',', '.') }}</td>
        </tr>
        <tr class="padding-tb-2" colspan="2">
            <td class="fs-10-fw-bold">Total</td>
            <td align="right">{{ 'Rp ' . number_format($pesanan->total_harga, 0, ',', '.') }}</td>
        </tr>
        <tr class="padding-tb-2" colspan="2" align="center">{{ $pesanan->tanggal_pesanan }}</tr>
    </table>
</body>
<script>
    window.print();
</script>

</html>