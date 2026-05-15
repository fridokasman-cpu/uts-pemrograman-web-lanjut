<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>CRUD Mahasiswa</h2>

<input type="text" id="prodi" placeholder="Prodi">
<input type="text" id="nama" placeholder="Nama">
<button onclick="simpan()">Simpan</button>

<hr>

<table border="1" width="50%">
    <thead>
        <tr>
            <th>Prodi</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="data"></tbody>
</table>

<script>
function loadData() {
    $.get('/mahasiswa/getData', function(data) {
        let html = '';
        data.forEach(function(row) {
            html += `
                <tr>
                    <td>${row.prodi}</td>
                    <td>${row.nama}</td>
                    <td>
                        <button onclick="hapus(${row.id})">Hapus</button>
                    </td>
                </tr>
            `;
        });
        $('#data').html(html);
    });
}

function simpan() {
    $.post('/mahasiswa/simpan', {
        prodi: $('#prodi').val(),
        nama: $('#nama').val()
    }, function() {
        loadData();
    });
}

function hapus(id) {
    $.get('/mahasiswa/hapus/' + id, function() {
        loadData();
    });
}

loadData();
</script>

</body>
</html>