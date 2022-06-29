<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title'); ?></title>
    <link href="<?= base_url() ?>/css/styles.css" rel="stylesheet" />

    <link href="<?= base_url() ?>/vendors/fontawesame/css/all.min.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= base_url() ?>/vendors/bootbox/bootbox.all.min.js"></script>

    <?= $this->renderSection('pageStyles') ?>

</head>

<body>
    <!-- navbar component -->

    <!-- sidebar component -->

    <div id="layoutSidenav">
        <?= $this->renderSection('main') ?>

        <div id="layoutSidenav_content">
            <main>
                <!-- <div class="container px-4"> -->
        </div>
        </main>
    </div>
    </div>





    <script type="text/javascript" src="<?= base_url() ?>/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- popper -->
    <script type="text/javascript" src="<?= base_url() ?>/vendors/popper/popper.min.js"></script>

    <!-- Font Awesome -->
    <!-- <script type="text/javascript" src="<?= base_url() ?>/vendors/fontawesame/js/all.js"></script>
   -->
    <!-- Custom scripts -->


    <script src="<?= base_url() ?>/js/scripts.js"></script>
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>