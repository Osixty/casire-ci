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
      DataTable Example
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <table class="table" id="datatablesProduk">
          <thead>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
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
<script src="<?= base_url() ?>/js/product.js"></script>
<?= $this->endSection() ?>