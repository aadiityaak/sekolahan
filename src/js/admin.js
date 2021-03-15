$(document).ready(function($) {
    $('#tablesiswa').DataTable( {
        "ajax": "http://localhost/sekolah/wp-json/siswa/v1/id/1",
        "columns": [
            { "data": "id" },
            { "data": "nama" },
            { "data": "phone" },
            { "data": "kelas" },
            { "data": "email" },
            { "data": "alamat" },
            { "data": "jenis_kelamin" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir" },
            { "data": "nama_ayah" },
            { "data": "nama_ibu" },
            { "data": "nama_wali" },
            { "data": "saudara" },
            { "data": "pendapatan_ortu" },
            { "data": "spp" }
        ],
        "columnDefs": [
            {
                "targets": [ 7,8,9,10,11,14 ],
                "visible": false
            }
        ]
    } );
} );