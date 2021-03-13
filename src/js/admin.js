$(document).ready(function($) {
    $('#tablesiswa').DataTable( {
        "ajax": "//localhost/sekolah/wp-content/themes/sekolahan/src/js/objects.txt",
        "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    } );
} );