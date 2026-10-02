@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="fw-semibold">Laporan</h3>
        <h6>Laporan ini menampilkan transaksi yang telah dilakukan.</h6>
        <div class="card mt-4">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Filter Rentang Tanggal <i class="ti ti-calendar mr-2"></i>
                </button>
                <a href="{{ route('laporan.export-pdf', request()->all()) }}" class="btn btn-success ms-1">Export PDF</a>
                <select class="btn btn-outline-success ms-1" id="filterDropdown" onchange="submitFilter()">
                    <option value="all" {{ request('filter') == 'all' || !request('filter') ? 'selected' : '' }}>Semua</option>
                    <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                    <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>Tahun Ini</option>
                </select>                
                @if(request('start_date') || request('end_date') || (request('filter') && request('filter') != 'all'))
                    <a href="{{ route('laporan.index') }}" class="btn btn-outline-danger ms-1">Reset Filter</a>
                @endif
                <div class="table-responsive mt-3">
                    <table id="data-table" class="table table-striped table-borderless w-100">
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
                                <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                                <td>{{ $item->paket->nama_paket ?? '-' }}</td>
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
                                <td>{{ $item->tanggal_pesanan ?? '-' }}</td>
                                <td>{{ $item->tanggal_proses ?? '-' }}</td>
                                <td>{{ $item->tanggal_selesai ?? '-' }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('laporan.index') }}" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Rentang Tanggal</h5>
                </div>
                <div class="modal-body">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    
                    <label for="end_date" class="mt-3">Tanggal Akhir:</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Terapkan</button>
                </div>
            </form>
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

        function submitFilter() {
            const filter = document.getElementById('filterDropdown').value;
            window.location.href = "{{ route('laporan.index') }}?filter=" + filter;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#data-table').DataTable();
        });
    </script>
@endsection