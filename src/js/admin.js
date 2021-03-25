$(function($) {
    $('#tablesiswa').DataTable( {
        "ajax": opt.restUrl+"siswa/v1/all",
        "columns": [
            { 
                "data": "id",
                className: "primary-key",
            },
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
            { "data": "spp" },
            {
                data: "",
                className: "dt-center editor-edit",
                defaultContent: '<a class="btn btn-sm btn-dark edit-btn text-white" data-toggle="modal" data-target="#modal-siswa"><i class="fa fa-pencil"></i></a>',
                orderable: false
            },
            {
                data: "",
                className: "dt-center editor-delete",
                defaultContent: '<i class="fa fa-trash"/>',
                orderable: false
            }
        ],
        "pageLength": 50,
        "columnDefs": [
            {
                "targets": [ 4,6,7,8,9,10,11,12,13,14 ],
                "visible": false
            }
        ]
    } );

    $(document).on('click', '.edit-btn', function(){
        var id = $(this).closest('tr').find('.primary-key').text();
        $.ajax({
            url: opt.restUrl+"siswa/v1/id/"+id,
            dataType: "json"
        }).done(function(data) {
            // console.log(data['data']);
            let obj = data['data'][0];
            let konten = '';
            let muted,type;
            $( '.modal-title' ).html( data['data'][0]['nama'] );

            $.each( obj, function( key, value ) {
                if(key !== 'created'){
                    muted = $.inArray(key, ['id']) !== -1 ? 'disabled' : '';
                    type = $.inArray(key, ['tanggal_lahir']) !== -1 ? 'date' : '';
                    
                    konten += "<label for='"+key+"'>"+key.substring(0, 1).toUpperCase() + key.substring(1).replace('_', ' ')+"</label>" ;
                    if($.inArray(key, ['alamat']) === -1){
                        konten += "<input type='"+type+"' id='"+key+"' name='"+key+"' class='form-control mb-1' value='"+value+"' "+muted+"/>" ;
                    } else {
                        konten += "<textarea id='"+key+"' name='"+key+"' class='form-control mb-1' "+muted+"/>"+value+"</textarea>" ;
                    }
                    
                } 
              });

            $( '.modal-body .form-siswa' ).html( konten );
            $( '.save-btn' ).html( 'Update Data' );
          }).fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    });
    $(document).on('click', '.add-btn', function(){
        $.ajax({
            url: opt.restUrl+"siswa/v1/id/",
            dataType: "json"
        }).done(function(data) {
            console.log(data['data']);
            let obj = data['data'];
            let konten = '';
            let type;
            $( '.modal-title' ).html( 'Tambah Siswa' );

            konten += "<label for='id'>Id</label>" ;
            konten += "<input type='text' id='id' name='id' class='form-control' value='' />" ;
            $.each( obj, function( key, value ) {
                if(key !== 'created'){
                    type = $.inArray(key, ['tanggal_lahir']) !== -1 ? 'date' : '';
                    
                    konten += "<label for='"+key+"'>"+key.substring(0, 1).toUpperCase() + key.substring(1).replace('_', ' ')+"</label>" ;
                    if($.inArray(key, ['alamat']) === -1){
                        konten += "<input type='"+type+"' id='"+key+"' name='"+key+"' class='form-control mb-1' value='' />" ;
                    } else {
                        konten += "<textarea id='"+key+"' name='"+key+"' class='form-control mb-1' /></textarea>" ;
                    }
                } else {
                    var dt = new Date();
                    var now = dt.getFullYear() + "-" + dt.getMonth()+1 + "-"+dt.getDate()+" " +dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                    
                    konten += "<input type='"+type+"' id='"+key+"' name='"+key+"' class='form-control mb-1' value='"+now+"' muted/>" ;
                }
                });

            $( '.modal-body .form-siswa' ).html( konten );
            $( '.save-btn' ).html( 'Simpan' );
            }).fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    });
    $(document).on('click', '.save-btn', function(){
        var input = [];
        $("form.form-siswa :input").each(function(){
            input.push($(this).val());
        });
        $.ajax({
            url: opt.restUrl+"siswa/v1/update/",
            dataType: "json",
            method: "POST",
            data: {data : input}
        }).done(function(data) {
            console.log(data);
        }).fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
        // console.log(input);
        $('#modal-siswa').modal('hide')
    });
});