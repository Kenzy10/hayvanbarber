@extends('backend.layouts.main')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
@endpush

@section('content')


<div class="user-page">

    <div class="user-card">

        <div class="user-header">
            <a href="{{ route('user.create') }}" class="btn-tambah">
                <i class="fas fa-plus-circle"></i>
                Tambah
            </a>
        </div>

        <h3 class="title-user">Data User</h3>

        <table class="table-user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
               @foreach($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nama_admin }}</td>

                   <td>
                        <span class="badge-role">
                            {{ $user->role }}
                        </span>
                    </td>

                    <td>
                        <span class="badge-status {{ $user->status == 'Aktif' ? 'aktif' : 'nonaktif' }}">
                            {{ $user->status }}
                        </span>
                    </td>

                    <td>
                       <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Ubah
                        </a>

                       <form action="{{ route('user.destroy', $user->id) }}"
                        method="POST"
                        class="delete-form"
                        style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>

                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="pagination-wrapper">
    <div class="custom-pagination">

    @if ($users->onFirstPage())
        <span class="page-btn disabled">‹</span>
    @else
        <a href="{{ $users->previousPageUrl() }}" class="page-btn">‹</a>
    @endif

    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)

        @if($page == $users->currentPage())
            <span class="page-btn active">{{ $page }}</span>
        @else
            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
        @endif

    @endforeach

    @if ($users->hasMorePages())
        <a href="{{ $users->nextPageUrl() }}" class="page-btn">›</a>
    @else
        <span class="page-btn disabled">›</span>
    @endif

</div>
</div>
       

    </div>

</div>

@endsection
@push('js')

<script>
    @if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
@endif

document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({
            title: 'Hapus User?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});


</script>


@endpush