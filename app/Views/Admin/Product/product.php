<?= $this->extend('/layout/layout_admin') ?>

<?= $this->section('title') ?>List Produk <?= $this->endSection() ?>

<?= $this->section('pageStyles') ?>

<!-- load datatabel.js -->
<?= $this->include('/layout/component/load/datatabel') ?>

<?= $this->endSection() ?>


<?= $this->section('main') ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Produk</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Produk</li>
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Data Product
      <div class="float-end">
        <a class="btn btn-success" href="<?= base_url() ?>/admin/product/new">
          <i class="fa-solid fa-plus"></i> Product
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <table class="table" id="datatablesProduk">
          <thead>
            <tr>
              <th>Name</th>
              <th>Category</th>
              <th>Stock</th>
              <th>sold</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
  $(document).ready(function() {
    table = $('#datatablesProduk').DataTable({
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      "info": false,
      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?php echo site_url('admin/product/ajaxList') ?>",
        "type": "POST",
        "data": function(data) {
          //   data.keadaan = $('input:radio[name="keadaan"]:checked').val();
        }
      },

      //Set column definition initialisation properties.
      "columnDefs": [{
        "targets": [2, 3, 4], //first column / numbering column
        "orderable": false, //set not orderable
      }, ],
    });
  });
</script>
<?= $this->endSection() ?>