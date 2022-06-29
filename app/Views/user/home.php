<?= $this->extend('/layout/layout_user') ?>

<?= $this->section('title') ?>Casir<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="container-fluid mt-4" >
<div class="main-carousel"  data-flickity='{ "wrapAround": true }'>
    <img src="/image/cw.png" class="d-block w-100" alt="...">
    <img src="/image/luak.png" class="d-block w-100" alt="...">
    <img src="/image/jahe.png" class="d-block w-100" alt="...">
</div>
</div>

<?= $this->endSection() ?>