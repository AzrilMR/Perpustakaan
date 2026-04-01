<form method="POST" action="/admin/books">
    @csrf
    <input type="text" name="judul" placeholder="Judul">
    <input type="text" name="penulis" placeholder="Penulis">
    <input type="number" name="stok" placeholder="Stok">

    <button type="submit">Simpan</button>
</form>