@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Edit Merk</h2>
        <form action="{{ route('merk.update', $merk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Merk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $merk->nama) }}" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Merk</label>
                @if($merk->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('assets/gambar/' . $merk->gambar) }}" alt="{{ $merk->nama }}" width="150">
                    </div>
                @endif
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
