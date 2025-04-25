@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Merk</h2>
        <form action="{{ route('merk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Merk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Merk</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
