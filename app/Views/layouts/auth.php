<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo getenv("app.name"); ?></title>

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('assets/img/logos/icon.png'); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets/img/logos/icon.png'); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets/img/logos/icon.png'); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/logos/icon.png'); ?>">
<link rel="manifest" href="<?php echo site_url('assets/img/favicons/manifest.json'); ?>">
<meta name="msapplication-TileImage" content="<?php echo site_url('assets/img/favicons/mstile-150x150.png'); ?>">
<meta name="theme-color" content="#ffffff">

<script src="assets/js/config.navbar-vertical.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link href="assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
<link href="assets/css/theme.css" rel="stylesheet">

</head>


<body class="bg-white">

<main class="main" id="top">
  <div class="container-fluid">
    <?php $this->renderSection("content"); ?>
  </div>
</main>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/lib/@fortawesome/all.min.js"></script>
<script src="assets/lib/stickyfilljs/stickyfill.min.js"></script>
<script src="assets/lib/sticky-kit/sticky-kit.min.js"></script>
<script src="assets/lib/is_js/is.min.js"></script>
<script src="assets/lib/lodash/lodash.min.js"></script>
<script src="assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<script src="assets/js/theme.js"></script>

</body>

</html>