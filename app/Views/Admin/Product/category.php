<?= $this->extend('/layout/layout_admin') ?>

<?= $this->section('title') ?>List category <?= $this->endSection() ?>

<?= $this->section('pageStyles') ?>

<!-- load datatabel.js -->
<?= $this->include('/layout/component/load/datatabel') ?>

<?= $this->endSection() ?>


<?= $this->section('main') ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">category</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable category
            <div class="float-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryaddModal"><i class="fa-solid fa-plus"></i> Category </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table responsive">
                <table class="table" id="datatablescategory">
                    <thead>
                        <tr>

                            <th>Category Name</th>
                            <th>Dsc</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="categoryaddModal" tabindex="-1" aria-labelledby="categoryaddtModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryaddModalLabel">Tambah Category </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form_add" action="<?= base_url() ?>/admin/category" method="post">

                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <div class="mb-3">
                        <label class="form-label">nama</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp" required>
                        <!--  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    -->
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="dsc" class="form-control" required>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="categoryeditModal" tabindex="-1" aria-labelledby="categoryeditModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryeditModalLabel">Edit Category </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form_edit" action="<?= base_url() ?>/admin/categoryx" method="post">

                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="id" />

                    <div class="mb-3">
                        <label class="form-label">nama</label>
                        <input type="text" name="name" class="form-control" required>
                        <!--  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    -->
                        <input type="hidden" name="name_old" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="dsc" class="form-control" required>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="active" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch <b>Status</b></label>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>

<script>
    $(document).ready(function() {
        table = $('#datatablescategory').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "<?= site_url('/admin/category/ajaxList') ?>",
                "type": "POST",
                "data": function(data) {
                    //data.keadaan = $('input:radio[name="keadaan"]:checked').val();
                    data.csrf_test_name = $('.txt_csrfname').val();
                },
                "dataSrc": function(json) {
                    // Update CSRF hash
                    // $('.txt_csrfname').val(json.token);
                    relo(json.token)
                    return json.data;
                },
            },
            "columnDefs": [{
                "targets": [3, 2],
                "orderable": false,
            }, ],
        });

        function relo(e) {
            $('.txt_csrfname').val(e);
        }
        /* add */
        categoryaddModal = $('#categoryaddModal');
        categoryaddModal.on("hidden.bs.modal", function() {
            $('#form_add')[0].reset();
            $("#form_add input[name='name']").removeClass('is-invalid')
        });

        $("#form_add").submit(function(e) {
            $("#form_add button[type='submit']").attr("disabled", true);
            e.preventDefault();
            form = $(this);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: form.serialize(),
                statusCode: {
                    201: function() {
                        $.alert({
                            title: 'Alert!',
                            content: 'berhasil',
                        });
                        categoryaddModal.modal('toggle');
                        table.ajax.reload();
                    },
                    404: function() {
                        $.alert({
                            title: 'Error',
                            icon: 'fa fa-warning',
                            type: 'orange',
                            content: 'page not found',
                        });
                    },
                    400: function(e) {
                        if (e.responseJSON.messages.name) {
                            $.confirm({
                                title: 'Error',
                                icon: 'fa fa-warning',
                                content: e.responseJSON.messages.name,
                                buttons: {
                                    Ok: function() {
                                        $("#form_add input[name='name']").focus()
                                        $("#form_add input[name='name']").addClass('is-invalid')
                                    },
                                }
                            });

                        };

                    },
                    500: function(e) {
                        $.alert({
                            title: 'Error',
                            icon: 'fa fa-warning',
                            type: 'orange',
                            content: "server dalam perbaikan",
                        });
                    }
                }
            }).always(function() {
                $("#form_add button[type='submit']").attr("disabled", false);
            });

            return false;
        });
    });

    /* edit */
    categoryeditModal = $('#categoryeditModal');
    categoryeditModal.on("hidden.bs.modal", function() {
        $('#form_edit')[0].reset();
        $("#form_edit input[name='name']").removeClass('is-invalid')
    });

    function editc(e) {
        $.ajax({
                url: "<?php echo site_url('admin/category/ajaxid/'); ?>" + e,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
            })
            .done(function(data) {
                $("#categoryeditModalLabel").html("Edit Category <b>" + data.data.name + "</b>");
                $("#form_edit input[name='name']").val(data.data.name);
                $("#form_edit input[name='name_old']").val(data.data.name);
                $("#form_edit input[name='dsc']").val(data.data.dsc);
                $("#form_edit input[name='active']").prop("checked", (data.data.active == '1') ? true : false);
                $("#form_edit input[name='id']").val(data.data.id);
                // return data;
                /* 
                                id "4"
                                name "sa" category/update
                                dsc "ss"status
                                active "1" */
                categoryeditModal.modal('show');

            })
            .fail(function(data) {
                $.alert({
                    title: 'Apa yang salah?',
                    content: 'terjadi kesalahan , refres halaman anda <br> data mungkin telah diubah',
                });
            });


    }
    $("#form_edit").submit(function(e) {
        $("#form_edit button[type='submit']").attr("disabled", true);
        e.preventDefault();
        form = $(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?= base_url('admin/category/update') ?>/" + $("#form_edit input[name='id']").val(),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: form.serialize(),
            statusCode: {
                201: function() {
                    $.alert({
                        title: 'Alert!',
                        content: 'berhasil',
                    });
                    categoryeditModal.modal('toggle');
                    table.ajax.reload();
                },
                404: function() {
                    $.alert({
                        title: 'Error',
                        icon: 'fa fa-warning',
                        type: 'orange',
                        content: 'page not found',
                    });
                },
                400: function(e) {
                    if (e.responseJSON.messages.name) {
                        $.confirm({
                            title: 'Error',
                            icon: 'fa fa-warning',
                            content: e.responseJSON.messages.name,
                            buttons: {
                                Ok: function() {
                                    $("#form_add input[name='name']").focus()
                                    $("#form_add input[name='name']").addClass('is-invalid')
                                },
                            }
                        });

                    };

                },
                500: function(e) {
                    $.alert({
                        title: 'Error',
                        icon: 'fa fa-warning',
                        type: 'orange',
                        content: "server dalam perbaikan",
                    });
                }
            }
        }).always(function() {
            $("#form_edit button[type='submit']").attr("disabled", false);
        });

        return false;
    });
    /* dell */
    function delc(i) {
        $.confirm({
            title: 'Delete category?',
            content: 'Apakah anda yakin akan menghapus ini <br> Semua product yang terkait akan <b> kehilagan </b> category ini',
            autoClose: 'Batal|8000',
            buttons: {
                delete: {
                    text: 'Hapus',
                    action: function() {
                        del(i);
                    }
                },
                Batal: {
                    btnClass: 'btn-warning '
                }
            }
        });

    }

    function del(id) {
        $.ajax({
                url: "<?php echo site_url('admin/category/delete/'); ?>" + id,
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },

            })
            .done(function(data) {
                table.ajax.reload();
            })
            .fail(function(data) {
                $.alert({
                    title: 'Error',
                    icon: 'fa fa-warning',
                    type: 'orange',
                    content: "Data kemungkinan sudah diubah diperangkat lain",
                });
                table.ajax.reload();
            });
    }
</script>
<?= $this->endSection() ?>