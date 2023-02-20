@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-header">
            <h3>FORMULIR PEMINJAMAN</h3>
        </div>
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ Route('user.submit_peminjaman') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" readonly value="{{ Auth::user()->username }}" required>
                </div>
                <div class="mb-3">
                    <label>Pilih Buku</label>
                    <select name="buku_id" class="choises form-select" required>
                        <option disabled selected>Silahkan Pilih Opsi</option>
                        @foreach ($buku as $buku)
                            <option value="{{ $buku->id }}">
                                {{ isset($buku_id) ? ($buku_id == $buku->id ? 'selected' : '') : '' }}
                                {{ $buku->judul}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" class="form-control" readonly value="{{ date('Y-m-d') }}" name="tanggal_peminjaman" required>
                </div>
                <div class="mb-3">
                    <label>Kondisi Buku</label>
                    <select name="kondisi_buku_saat_dipinjam" class="choises form-select" required>
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <button type="submit" class="btn btn-info btn-outline-dark">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

@endsection