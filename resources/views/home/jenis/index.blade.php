@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Daftar Jenis</h2>
    <a href="{{ route('jenis.create') }}" class="btn btn-primary mb-3">Tambah Jenis</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenis as $j)
            <tr>
                <td>{{ $j->id }}</td>
                <td>{{ $j->nama }}</td>
                <td>
                    <a href="{{ route('jenis.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jenis.destroy', $j->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jenis ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
