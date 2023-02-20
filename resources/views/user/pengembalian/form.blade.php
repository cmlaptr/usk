@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Form Pengembalian Buku</h4>
            </div>
            <div class="card-body">
                <form action="{{ Route('user.submit_pengembalian') }}" class="form-group" method="POST" >
                @csrf
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <select name="buku_id" class="choises form-select" required>
                        <option value="" disabled selected>--PILIH OPSI--</option>
                        @foreach ($judul as $j)
                            <option value="{{ $j->buku->id }}">
                                {{ $j->buku->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tanggal_pengembalian" value="{{ date('Y-m-d') }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Kondisi Buku</label>
                    <select name="kondisi_buku_saat_dikembalikan" class="choises form-select" required>
                        <option value="" disabled selected>--PILIH OPSI--</option>
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak [20.000]</option>
                        <option value="hilang">Hilang [50.000]</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection