@extends('backend.layouts.main')

@section('content')
<div style="padding: 40px; font-family: 'Arial', sans-serif;">
    <div style="background-color: white; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); padding: 40px; min-height: 500px;">

        <div style="margin-bottom: 25px;">
            <a href="{{ route('layanan.create') }}" style="background: white; border: 1.5px solid black; border-radius: 20px; padding: 6px 18px; font-size: 14px; font-weight: bold; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; color: black;">
                <span style="font-size: 14px;">+</span> Tambah Layanan
            </a>
        </div>

        <h2 style="font-size: 26px; font-weight: 800; color: black; margin: 0 0 20px 0;">Data Layanan</h2>

        <table style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-size: 14px;">
            <thead>
                <tr style="background-color: white;">
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: center; width: 60px;">No</th>
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: left;">Nama Layanan</th>
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: left;">Harga</th>
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: center; width: 150px;">Durasi</th>
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: center; width: 100px;">Status</th>
                    <th style="border: 1.5px solid #000; padding: 15px; text-align: left; width: 220px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($layanan as $index => $l)
                <tr>
                    <td style="border: 1.5px solid #000; padding: 15px; text-align: center; font-weight: bold;">{{ $index + 1 }}</td>
                    
                    <td style="border: 1.5px solid #000; padding: 15px;">{{ $l->layanan }}</td>
                    
                    <td style="border: 1.5px solid #000; padding: 15px;">Rp {{ number_format($l->harga, 0, ',', '.') }}</td>
                    <td style="border: 1.5px solid #000; padding: 15px; text-align: center;">{{ $l->durasi }}</td>
                    <td style="border: 1.5px solid #000; padding: 15px; text-align: center; vertical-align: middle;">
                        @if($l->status == 'Aktif')
                            <span style="background-color: #00ff1a; color: black; font-size: 12px; font-weight: bold; padding: 6px 12px; border-radius: 4px; display: inline-block;">
                                Aktif
                            </span>
                        @else
                            <span style="background-color: #ff3b3b; color: white; font-size: 12px; font-weight: bold; padding: 6px 12px; border-radius: 4px; display: inline-block;">
                                Nonaktif
                            </span>
                        @endif
                    </td>
                    <td style="border: 1.5px solid #000; padding: 15px;">
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('layanan.edit', $l->id) }}" style="background-color: #38b6ff; color: white; padding: 5px 15px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: bold; display: inline-flex; align-items: center;">
                                📝 Ubah
                            </a>

                            <form id="delete-form-{{ $l->id }}" action="{{ route('layanan.destroy', $l->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            
                            <button type="button" onclick="konfirmasiHapus('{{ $l->id }}')" style="background-color: #ff3b3b; color: white; border: none; padding: 5px 15px; border-radius: 4px; font-size: 13px; font-weight: bold; cursor: pointer;">
                                🗑️ Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $layanan->links() }}
        </div>
    </div>
</div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // 1. Notifikasi Sukses setelah Redirect
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    // 2. Fungsi Konfirmasi Hapus yang dipanggil oleh Tombol
    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Hapus Layanan?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3b3b',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mencari form berdasarkan ID unik lalu men-submit nya
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush