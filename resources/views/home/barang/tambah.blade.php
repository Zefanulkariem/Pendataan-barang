@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Barang</h2>
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jenis_id" class="form-label">Jenis Barang</label>
                <select class="form-select" id="jenis_id" name="jenis_id" required>
                    <option value="" selected disabled>Pilih Jenis</option>
                    @foreach($jenis as $j)
                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <select class="form-select" id="merk" name="merk" required>
                    <option value="" selected disabled>Pilih Merk</option>
                    @foreach($merks as $merk)
                        <option value="{{ $merk->nama }}">{{ $merk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Barang</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" min="0" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
