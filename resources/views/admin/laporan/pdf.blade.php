<!DOCTYPE html>
<html>
<head>
    <title>Laporan SI Laundry</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Invoice</th>
                <th>Pelanggan</th>
                <th>Paket</th>
                <th>Berat</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
                <th>Tanggal Diproses</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $key => $item)
                
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->no_invoice }}</td>
                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->paket->nama_paket }}</td>
                <td>{{ $item->berat }}</td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>
                    @if ($item->status == 'Pending')
                        <span class="badge bg-dark text-white">{{ $item->status }}</span>
                    @elseif ($item->status == 'Diproses')
                        <span class="badge bg-warning text-white">{{ $item->status }}</span>
                    @elseif ($item->status == 'Selesai')
                        <span class="badge bg-success text-white">{{ $item->status }}</span>
                    @elseif ($item->status == 'Diterima')
                        <span class="badge bg-primary text-white">{{ $item->status }}</span>
                    @endif
                </td>
                <td>{{ $item->tanggal_pesanan }}</td>
                <td>{{ $item->tanggal_diproses }}</td>
                <td>{{ $item->tanggal_selesai }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
