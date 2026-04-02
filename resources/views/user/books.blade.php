<h2>Daftar Buku</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

@foreach($books as $b)
<div style="border:1px solid black; margin:10px; padding:10px;">
    
    <p><b>{{ $b->judul }}</b></p>
    <p>Penulis: {{ $b->penulis }}</p>
    <p>Stok: {{ $b->stok }}</p>

    @if($b->stok > 0)
    <form method="POST" action="/user/pinjam/{{ $b->id }}">
        @csrf
        <button type="submit">Pinjam</button>
    </form>
    @else
        <p style="color:red;">Stok habis</p>
    @endif

</div>
@endforeach