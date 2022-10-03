<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= isset($title) ? $title : 'Roda Maju' ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href=" <?= base_url('/') ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome css -->
    <link rel="stylesheet" href=" <?= base_url('/') ?>assets/libs/fontawesome/css/all.min.css">

    <!-- datepicker bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <script src="<?= base_url('/') ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('/') ?>assets/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href=" <?= base_url('/') ?>assets/css/app.css">


</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('layouts/_navbar') ?>
    <!-- End Navbar -->

    <!-- Content -->
    <?php $this->load->view($page); ?>
    <!-- End Content -->

    <script src=" <?= base_url('/') ?>assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src=" <?= base_url('/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src=" <?= base_url('/') ?>assets/js/app.js"></script>

    <script>
        $(function() {
            $("#datee").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                language: 'id'
            });
        });
    </script>
</body>

</html>