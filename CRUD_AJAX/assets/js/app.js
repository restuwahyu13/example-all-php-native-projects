$(() => {

    //handling file upload name
    $(".custom-file-input ").on('change', function() {
        const filename = $(this).val().split('\\').pop();
        $(this).siblings().addClass('selected').html(filename);
    });
    //jalankan fungsi table dan pagination
    dataTable();
    //fungsi update data
    updateData();
    //fungsi tambah data
    tambahData();
    //fungsi pagination
    $(document).on('click', '.pagination li', function (e) {
        e.preventDefault();
        const page = $(this).attr('id');
        dataTable(page);
    });

    //fungsi page sebelumnya
    $(document).live('click', '.pagination .prev', (e) => {
        e.preventDefault();
        const prev = $(this).attr('id');
        dataTable(prev);
    });

    //fungsi page selanjutnya
    $(document).live('click', '.pagination .next', (e) => {
        e.preventDefault();
        const next = $(this).attr('id');
        dataTable(next);
    });

    //fungsi page default index awal
    $(document).live('click', '.pagination .left_link', (e) => {
        e.preventDefault();
        const left_link = $(this).attr('id');
        dataTable(left_link);
    });

    //fungsi page default index akhir
    $(document).live('click', '.pagination .right_link', (e) => {
        e.preventDefault();
        const right_link = $(this).attr('id');
        dataTable(right_link);
    });

});

// fungsi tambah data ajax
function tambahData() {

    //fungsi tambah data
    $("#formData").on('submit', function (e)  {
        e.preventDefault();
        $.ajax({
            url: 'http://localhost/CRUD_AJAX/controllers/tambahData.php',
            type: 'POST',
            statusCode: {
                404: function () {
                    alert('ajax error');
                }
            },
            contentType: false,
            processData:false,
            data: new FormData(this),
            success: function (data) {
                dataTable();
                if (data !== false) {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                }
            }
        });
    });
}

//fungsi load data table ajax
function dataTable(pageId) {

    $.ajax({
        url: 'http://localhost/CRUD_AJAX/controllers/tableData.php',
        method: 'POST',
        data: {'hal': pageId},
        success: function(data) {
            $("#dataTable").html(data);
        }
    });
}

//fungsi hapus data ajax
function deleteData(deleteID) {

    swal({
        title: "Apakaha Anda Yakin ?",
        text: "Data yang sudah dihapus tidak akan kembali lagi",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: 'http://localhost/CRUD_AJAX/controllers/deleteData.php',
                    type: 'POST',
                    data: {'deleteData': deleteID},
                    success: function (data) {
                        dataTable();

                        swal("Data Berhasil dihapus", {
                            icon: "success",
                        });
                    }
                });

            } else {
                swal("Data Gagal Dihapus");
            }
        });
}

//fungsi edit data ajax
function editData(editID) {

    $.ajax({
        url: 'http://localhost/CRUD_AJAX/controllers/editData.php',
        type: 'POST',
        data: {'editData': editID},
        dataType: 'json',
        success: function (data) {
            dataTable();
            $("#idu").val(data.id);
            $("#fnu").val(data.first_name);
            $("#lnu").val(data.last_name);
            $("#cnu").val(data.country_name);

        }
    });
}

//fungsi update data ajax
function updateData() {

    $("#formUpdate").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://localhost/CRUD_AJAX/controllers/updateData.php',
            type: 'POST',
            statusCode: {
                404: function () {
                    alert('ajax error detected');
                }
            },
            contentType: false,
            processData:false,
            data: new FormData(this),
            success: function (data) {
                if (data !== false) {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                }
            }
        });

    });
}

//fungsi cari data ajax
function searcData() {

    const search = $("#cari").val();
    const table = '';

    $.ajax({
        url: 'http://localhost/CRUD_AJAX/controllers/cariData.php',
        method: 'GET',
        statusCode: {404: () =>{
                alet('request data error');
            }} ,
        data:{'cari': search},
        success: function (data) {

            if(search  !== '') {
                $("#dataTable").html(table.concat(data));
            }else {
                dataTable();
            }
        },
    });
}