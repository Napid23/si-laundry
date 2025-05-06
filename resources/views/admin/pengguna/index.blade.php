@extends('admin.layouts.main')

@section('style')
    
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="fw-semibold">Pengguna</h3>
        <h6>Menu ini digunakan untuk menambahkan pengguna yang dapat mengakses website</h6>
        <div class="card mt-4">
            <div class="card-body">
                <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-4"><i class="ti ti-plus mr-2"></i>Tambah Pengguna</a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-borderless w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $item)
                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td><span class="badge bg-primary rounded-3 fw-semibold">{{ $item->level }}</span></td>
                                <td>
                                    <a href="{{ route('pengguna.edit', $item->id) }}" class="text-succes fs-6 text-decoration-none"><i class="ti ti-edit"></i></a>
                                    <form action="{{ route('pengguna.destroy', $item->id) }}" method="post" id="deleteForm{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="text-danger fs-6 text-decoration-none cursor-pointer" onclick="confirmDelete('{{ $item->id }}')"><i class="ti ti-trash"></i></a>
                                    </form>
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