@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="fw-semibold">Pesanan</h3>
        <h6>Menu ini digunakan untuk mencatat dan mengelola data pesanan</h6>
        <div class="card mt-4">
            <div class="card-body">
                @if (Auth::user()->level == 'Admin')
                    <a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-4"><i class="ti ti-plus mr-2"></i>Tambah Pesanan</a>
                @endif
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-borderless w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Invoice</th>
                                <th>Pelanggan</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Total Harga</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status</th>
                                <th>Creator</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $key => $item)
                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->no_invoice }}</td>
                                <td>{{ $item->pelanggan->nama }}</td>
                                <td>{{ $item->paket->nama_paket }}</td>
                                <td>Rp {{ number_format($item->paket->harga_paket, 0, ',', '.') }}</td>
                                <td>{{ $item->berat }}</td>
                                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $item->tanggal_pesanan }}</td>
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
                                <td>{{ $item->creator->nama }}</td>
                                <td>
                                    <a href="{{ route('pesanan.show', $item->id) }}" class="text-warning fs-6 text-decoration-none"><i class="ti ti-eye"></i></a>
                                    @if (Auth::user()->level == 'Admin')
                                        <a href="{{ route('pesanan.nota_kecil', $item->id) }}" class="text-secondary fs-6 text-decoration-none"><i class="ti ti-file"></i></a>
                                        <a href="{{ route('pesanan.edit', $item->id) }}" class="text-succes fs-6 text-decoration-none"><i class="ti ti-edit"></i></a>
                                        <form action="{{ route('pesanan.destroy', $item->id) }}" method="post" id="deleteForm{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="text-danger fs-6 text-decoration-none cursor-pointer" onclick="confirmDelete('{{ $item->id }}')"><i class="ti ti-trash"></i></a>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
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
    <script>
        function confirmDelete(e) {
            swal({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete){
                    $('#deleteForm' + e).submit();
                } else {
                    swal("Data tidak jadi dihapus!", {
                        icon: "error",
                    });
                }
            });
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#data-table').DataTable();
        });
    </script>
@endsection