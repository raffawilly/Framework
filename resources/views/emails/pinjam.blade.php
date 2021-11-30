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
                    <th>Tanggal Pinjam</th>
                    <th>Keterangan</th>
                    <th>Lama Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listBuku as $Buku)
                <tr>
                    <td>{{ $Buku->Bukus->judul }}</td>
                    <td>{{ $Buku->Bukus->pengarang }}</td>
                    <td>{{ $Buku->tgl_pinjam}}</td>
                    <td>{{ $Buku->keterangan}}</td>
                    <td>{{ $Buku->lama_pinjam}} Hari</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
    </html>
