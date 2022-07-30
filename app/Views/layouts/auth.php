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

<script src="<?php echo site_url('assets/js/config.navbar-vertical.js'); ?>"></script>
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link href="<?php echo site_url('assets/lib/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet">
<link href="<?php echo site_url('assets/css/theme.css'); ?>" rel="stylesheet">

</head>


<body class="bg-white">

<main class="main" id="top">
  <div class="container-fluid">
    <div class="row min-vh-100 bg-100">
      <div class="col-6 d-none d-lg-block">
        <div class="bg-holder" style="background-image:url(<?php echo site_url('assets/img/generic/14.jpg'); ?>);background-position: 50% 20%;">
        </div>
      </div>
      <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
        <div class="row justify-content-center no-gutters">
          <div class="col-lg-9 col-xl-8 col-xxl-6">
            <div class="card">
              <div class="card-header bg-circle-shapee bg-dark text-center p-2"><a class="text-white text-sans-serif font-weight-extra-bold fs-4 z-index-1 position-relative" href="<?php echo base_url(); ?>">TORA</a></div>
              <div class="card-body p-4">
                <?php if(session()->get("message")){ ?>
                <div class="alert alert-<?php echo session()->get("status") ? "success" : "danger"; ?> p-2 mb-2">
                  <?php 
                  echo session()->get("message");
                  session()->remove("status");
                  session()->remove("message");
                  ?>
                </div>
                <?php } ?>
                <?php $this->renderSection("content"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/@fortawesome/all.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/stickyfilljs/stickyfill.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/sticky-kit/sticky-kit.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/is_js/is.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/lodash/lodash.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<script src="<?php echo site_url('assets/js/theme.js'); ?>"></script>

</body>

</html>