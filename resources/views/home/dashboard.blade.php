@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Filters and Search -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <select name="merk" class="form-select" onchange="this.form.submit()">
                        <option value="">Filter Merk</option>
                        @foreach($merks as $merk)
                            <option value="{{ $merk->nama }}" {{ request('merk') == $merk->nama ? 'selected' : '' }}>{{ $merk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="jenis" class="form-select" onchange="this.form.submit()">
                        <option value="">Filter Jenis</option>
                        @foreach($jenis as $j)
                            <option value="{{ $j->id }}" {{ request('jenis') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search Nama Barang" value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <!-- Barang Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Jenis</th>
                              <th>Merk</th>
                              <th>Gambar</th>
                              <th>Stok</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->jenis->nama ?? '-' }}</td>
                                <td>{{ $barang->merk->nama ?? '-' }}</td>
                                <td>
                                    @if($barang->gambar)
                                        <img src="{{ asset('assets/gambar/' . $barang->gambar) }}" alt="Gambar Barang" style="max-height: 100px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $barang->stok }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No data found.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
