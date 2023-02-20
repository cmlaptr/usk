@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            @foreach ($pemberitahuan as $p)
                <div class="alert alert-light-info" role="alert">
                    {{ $p->isi }}
                </div>
            @endforeach
            <div class="row">
                @foreach ($kategori as $k)
                    <div class="col-12">
                        <h5>
                            <span class="badge bg-success">{{ $k->nama }}</span>
                        </h5>
                        <div class="row">
                            @foreach ($buku as $b)
                                <div class="col-3">
                                    <div class="card" style="height:25rem">
                                        <div class="card-header">
                                            <center>
                                            <img src="{{ $b->foto ?? '/assets/image/hujan.jpg' }}" class="card-img" style="width: 100px">
                                            </center>
                                        </div>
                                        <div class="card-body">
                                            <h4>
                                                {{ $b->judul }}
                                            </h4>
                                            <span class="badge bg-info">{{ $b->kategori->nama }}</span>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-start">{{ $b->penerbit->nama }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="text-end">{{ $b->pengarang }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ Route('user.form_peminjaman') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $b->id }}" name="buku_id">
                                                <center>
                                                <button type="submit" class="btn btn-primary">PINJAM</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection