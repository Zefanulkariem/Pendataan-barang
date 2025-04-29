@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $barang->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_id" class="form-label">Jenis Barang</label>
            <select class="form-select" id="jenis_id" name="jenis_id" required>
                <option value="" disabled>Pilih Jenis</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}" {{ (old('jenis_id', $barang->jenis_id) == $j->id) ? 'selected' : '' }}>{{ $j->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <select class="form-select" id="merk" name="merk" required>
                <option value="" disabled>Pilih Merk</option>
                @foreach($merks as $merk)
                    <option value="{{ $merk->nama ?? '-'}}" {{ (old('merk', $barang->merk) == $merk->nama) ? 'selected' : '' }}>{{ $merk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            @if($barang->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" style="max-height: 150px;">
                </div>
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $barang->stok) }}" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
