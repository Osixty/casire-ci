<?= $this->extend('/layout/layout_user') ?>

<?= $this->section('title') ?>Casir<?= $this->endSection() ?>

<?= $this->section('pageStyles') ?>

<!-- load datatabel.js -->
<?= $this->include('/layout/component/load/datatabel') ?>

<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container-fluid px-4">
  <div class="card mb-4 mt-3">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Product
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-borderless" id="tblHome">
          

        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->Section('pageScripts') ?>
<script>
  $(document).ready(function() {
    table = $('#tblHome').DataTable({
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      "info": false,
      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?php echo site_url('user/ajaxList') ?>",
        "type": "POST",
        "data": function(data) {
          //   data.keadaan = $('input:radio[name="keadaan"]:checked').val();
        }
      },

      //Set column definition initialisation properties.
      "columnDefs": [{
        "targets": [4], //first column / numbering column
        "orderable": false , //set not orderable
      }, ],
    });
  });
</script>
<?= $this->endSection() ?>