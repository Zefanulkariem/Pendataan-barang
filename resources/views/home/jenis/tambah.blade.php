@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Jenis</h2>
        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jenis</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
