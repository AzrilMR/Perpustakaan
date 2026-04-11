@extends('layouts.app')

@section('content')

<h2>Daftar Buku</h2>

<!-- SEARCH -->
<form method="GET" action="/user/books" style="margin-bottom:20px;">
    <input 
        type="text" 
        name="search" 
        placeholder="Cari judul, penulis..."
        value="{{ $search ?? '' }}"
    >
    <button class="btn">Search</button>
</form>

<!-- FEEDBACK -->
@if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; margin-bottom:10px; border-radius:5px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px; border-radius:5px;">
        {{ session('error') }}
    </div>
@endif

<!-- HASIL KOSONG -->
@if($books->isEmpty())
    <p style="color:red;">Buku tidak ditemukan</p>
@endif

<!-- LIST BUKU -->
@foreach($books as $b)
<div class="card">

    <h3>{{ $b->judul }}</h3>

    <p><b>Penulis:</b> {{ $b->penulis }}</p>
    <p><b>Penerbit:</b> {{ $b->penerbit ?? '-' }}</p>
    <p><b>Tahun:</b> {{ $b->tahun ?? '-' }}</p>
    <!-- <p><b>Kategori:</b> {{ $b->category->nama_kategori ?? '-' }}</p> -->
    <p><b>Stok:</b> {{ $b->stok }}</p>

    @if($b->stok > 0)
        <form method="POST" action="/user/pinjam/{{ $b->id }}">
            @csrf
            <button class="btn">Pinjam</button>
        </form>
    @else
        <p style="color:red;">Stok habis</p>
    @endif

</div>
@endforeach

@endsection