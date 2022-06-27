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
<div class="modal fade" id="categoryaddModal" tabindex="-1" aria-labelledby="categoryaddModal" aria-hidden="true">
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


<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
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

        categoryaddModal = $('#categoryaddModal');
        categoryaddModal.on("hidden.bs.modal", function() {
            $('#form_add')[0].reset();
        });

        function relo(e) {
            $('.txt_csrfname').val(e);
        }

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
                        alert("berhasil");
                        categoryaddModal.modal('toggle');
                        table.ajax.reload();
                    },
                    404: function() {
                        alert("page not found");
                    },
                    400: function(e) {

                        if (e.responseJSON.messages.name) {
                            alert(e.responseJSON.messages.name);
                            $("#form_add input[name='name']").focus()
                        };

                    },
                    500: function(e) {
                        alert("server dalam perbaikan");
                    }
                }
            }).always(function() {
                $("#form_add button[type='submit']").attr("disabled", false);
            });

            return false;
        });


    });
   
  //  alert.close()
    function delc(i) {
        dte(i);
      
    }


    function dte(id) {
        $.ajax({
                url: "<?php echo site_url('admin/category/ajaxid/'); ?>" + id,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
            })
            .done(function(data) {
                return data;

            })
            .fail(function(data) {
               alert({
                    title: 'Apa yang salah?',
                    content: 'terjadi kesalahan mungkin',
                });
            });
    }

   
</script>
<?= $this->endSection() ?>