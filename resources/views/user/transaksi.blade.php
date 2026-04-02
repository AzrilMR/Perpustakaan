<h2>Riwayat Peminjaman</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

@foreach($transactions as $t)
<div style="border:1px solid black; margin:10px; padding:10px;">
    
    <p>
        Buku: 
        <b>{{ $t->book->judul ?? 'Buku tidak ditemukan' }}</b>
    </p>

    <p>Status: {{ $t->status }}</p>
    <p>Tanggal Pinjam: {{ $t->tanggal_pinjam }}</p>
    <p>Tanggal Kembali: {{ $t->tanggal_kembali ?? '-' }}</p>

    @if($t->status == 'dipinjam')
    <form method="POST" action="/user/kembali/{{ $t->id }}">
        @csrf
        <button type="submit">Kembalikan</button>
    </form>
    @endif

</div>
@endforeach