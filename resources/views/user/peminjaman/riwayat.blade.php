@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="row">
            <div class="col-9">
                <h5>Buku yang dipinjam</h5>
            </div>
            <div class="col-3">
                <a href="{{ route('user.form_peminjaman') }}" class="btn btn-light-info">Pinjam</a>
            </div>
    </div>

    <div class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table-striped-dark">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $key => $peminjaman)
                            <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $peminjaman->user->username }}</td>
                                <td>{{ $peminjaman->buku->judul }}</td>
                                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                                <td>{{ $peminjaman->kondisi_buku_saat_dipinjam }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
@endsection