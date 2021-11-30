    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Reminder</title>
    </head>
    <body>

        <h1>Halo, {{ $student->nm_student }} dengan email {{ $student->email }}</h1>
        <h3>Kamu sedang meminjam buku dari Perpustakaan kami.</h3>
        <p>Tertanggal : {{$tanggal}}</p>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Pengarang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listBuku as $listBuku)
                <tr>
                    <td>{{ $listBuku->Bukus->judul }}</td>
                    <td>{{ $listBuku->Bukus->pengarang }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
    </html>
