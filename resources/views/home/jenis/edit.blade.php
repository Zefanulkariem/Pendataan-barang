@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Edit Jenis</h2>
        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jenis</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $jenis->nama) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
