@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
    <h2>Daftar Merk</h2>
    <a href="{{ route('merk.create') }}" class="btn btn-primary mb-3">Tambah Merk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($merks as $index => $merk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $merk->nama }}</td>
                <td>
                    @if($merk->gambar)
                        <img src="{{ asset('assets/gambar/' . $merk->gambar) }}" alt="{{ $merk->nama }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('merk.edit', $merk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('merk.destroy', $merk->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus merk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada data merk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection
