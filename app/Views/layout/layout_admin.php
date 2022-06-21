<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $this->renderSection('title') ?></title>
    <link href="css/styles.css" rel="stylesheet" />
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>
    <!-- navbar component -->
    <?= $this->include('/layout/component/navbar') ?>
    <!-- sidebar component -->
   
    <div id="layoutSidenav">
    <?= $this->include('/layout/component/sidebar') ?>
       
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                <?= $this->renderSection('main') ?>
                </div>
            </main>
            <?= $this->include('/layout/component/footer') ?>
           
        </div>
    </div>




 
    <script type="text/javascript" src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- popper -->
    <script type="text/javascript" src="vendors/popper/popper.min.js"></script>

    <!-- Font Awesome -->
    <script type="text/javascript" src="vendors/fontawesame/js/all.js"></script>
    <!-- Custom scripts -->
    <?= $this->renderSection('pageScripts') ?>
    <script src="js/scripts.js"></script>
</body>

</html>