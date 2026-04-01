<a href="/admin/books/create">Tambah Buku</a>

<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($books as $b)
    <tr>
        <td>{{ $b->judul }}</td>
        <td>{{ $b->penulis }}</td>
        <td>{{ $b->stok }}</td>
        <td>
            <a href="/admin/books/{{ $b->id }}/edit">Edit</a>

            <form action="/admin/books/{{ $b->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>