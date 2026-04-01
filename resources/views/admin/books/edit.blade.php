<form method="POST" action="/admin/books/{{ $book->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="judul" value="{{ $book->judul }}">
    <input type="text" name="penulis" value="{{ $book->penulis }}">
    <input type="number" name="stok" value="{{ $book->stok }}">

    <button type="submit">Update</button>
</form>