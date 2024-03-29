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

<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link rel="stylesheet" href="<?php echo site_url('assets/lib/perfect-scrollbar/perfect-scrollbar.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/select2-bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/theme.css'); ?>">




<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<style> 
    body{background: #e8e8e8;}
    .select2-container .select2-selection--single .select2-selection__rendered {text-align: left;}
</style>
</head>


<body>
<main class="main" id="top">

<div class="container-fluid" data-layout="container">
    <nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
        <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper d-none d-block-sm">
                <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div><a class="navbar-brand" href="<?php echo base_url(); ?>">
                <div class="d-flex align-items-center py-3">
                    <img class="mr-2" src="<?php echo site_url('assets/img/logos/tora-logo.png'); ?>" alt="" width="100" />
                    <!-- <span class="text-sans-serif">falcon</span> -->
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar" style="background: #e8e8e8;">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-home"></span>
                                </span>
                                <span class="nav-link-text"> Ana Ekran</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="home">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-recycle"></span>
                                </span>
                                <span class="nav-link-text">Atık Yönetimi</span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="home" data-parent="#navbarVerticalCollapse">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('ewc_kodlar'); ?>">EWC Atık Kodları</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(route_to("atik_bildirimleri")); ?>">Atık Bildirimleri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(route_to("sevkiyatlarView")); ?>">Atık Sevkiyatı</a>
                            </li>
                        </ul>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(route_to("birimlerView")); ?>">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-home"></span>
                                </span>
                                <span class="nav-link-text"> Birim Yönetimi</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#evrak" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="evrak">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-file"></span>
                                </span>
                                <span class="nav-link-text">Evrak Yönetimi</span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="evrak" data-parent="#navbarVerticalCollapse">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(route_to("gelenlerView")); ?>">Gelen Evraklar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(route_to("gidenlerView")); ?>">Giden Evraklar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('yerlesim'); ?>">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                                <span class="nav-link-text"> Yerleşim Yönetimi</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kullanici'); ?>">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-user"></span>
                                </span>
                                <span class="nav-link-text"> Kullanıcı Yönetimi</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kuyu'); ?>">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-user"></span>
                                </span>
                                <span class="nav-link-text"> Kuyu Yönetimi</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand" style="background: #e8e8e8;">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand mr-1 mr-sm-3" href="<?php echo base_url(); ?>">
                <div class="d-flex align-items-center">
                    <img class="mr-2" src="<?php echo site_url('assets/img/logos/tora-logo.png'); ?>" alt="" width="100" />
                </div>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link 1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 3 <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">

                <li class="nav-item">
                    <a class="nav-link settings-popover" href="#settings-modal" data-toggle="modal"><span class="ripple"></span><span class="fa-spin position-absolute a-0 d-flex flex-center"><span class="icon-spin position-absolute a-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></a>

                </li>
                <li class="nav-item dropdown dropdown-on-hover">
                    <a class="nav-link notification-indicator notification-indicator-primary px-0 icon-indicator" id="navbarDropdownNotification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell fs-4" data-fa-transform="shrink-6"></span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
                        <div class="card card-notification shadow-none" style="max-width: 20rem">
                            <div class="card-header">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h6 class="card-header-title mb-0">Notifications</h6>
                                    </div>
                                    <div class="col-auto"><a class="card-link font-weight-normal" href="#">Mark all as read</a></div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush font-weight-normal fs--1">
                                <div class="list-group-title border-bottom">NEW</div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush bg-200" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl mr-3">
                                                <img class="rounded-circle" src="<?php echo base_url('assets/img/team/1-thumb.png'); ?>" alt="" />

                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>Just now</span>

                                        </div>
                                    </a>

                                </div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush bg-200" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl mr-3">
                                                <div class="avatar-name rounded-circle"><span>AB</span></div>
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                            <span class="notification-time"><span class="mr-1 fab fa-gratipay text-danger"></span>9hr</span>

                                        </div>
                                    </a>

                                </div>
                                <div class="list-group-title">EARLIER</div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl mr-3">
                                                <img class="rounded-circle" src="<?php echo base_url('assets/img/icons/weather-sm.jpg'); ?>" alt="" />

                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">🌤️</span>1d</span>

                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="card-footer text-center border-top"><a class="card-link d-block" href="../pages/notifications.html">View all</a></div>
                        </div>
                    </div>

                </li>
                <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="<?php echo site_url('assets/img/team/3-thumb.png'); ?>" alt="" />

                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                        <div class="bg-white rounded-soft py-2">
                            <a class="dropdown-item font-weight-bold text-warning" href="#!"><span class="fas fa-crown mr-1"></span><span>Go Pro</span></a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#!">Set status</a>
                            <a class="dropdown-item" href="../pages/profile.html">Profile &amp; account</a>
                            <a class="dropdown-item" href="#!">Feedback</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../pages/settings.html">Settings</a>
                            <a class="dropdown-item" href="<?php echo site_url(route_to("logoutAction")); ?>">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <?php echo view_cell("App\Components\AlertComponent::index");  ?>
        
        <div style="zoom: 0.9;">
            <?php $this->renderSection("content"); ?>
        </div>

        <?php $this->renderSection("modals"); ?>
        <footer>
            <div class="row no-gutters justify-content-between fs--1 mt-4 mb-3">
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">Buraya birşeyler yazılacak <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> <?php echo date("Y"); ?> &copy; <a href="https://toracevre.com">Tora Çevre</a></p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">v1.0.0</p>
                </div>
            </div>
        </footer>
        </div>
        <div class="modal fade modal-fixed-right modal-theme overflow-hidden" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="settings-modal-label" aria-hidden="true" data-options='{"autoShow":true,"autoShowDelay":3000,"showOnce":true}'>
            <div class="modal-dialog modal-dialog-vertical" role="document">
                <div class="modal-content border-0 vh-100 scrollbar perfect-scrollbar">
                    <div class="modal-header modal-header-settings">
                        <div class="z-index-1 py-1 flex-grow-1">
                            <h5 class="text-white" id="settings-modal-label"> <span class="fas fa-palette mr-2 fs-0"></span>Settings</h5>
                            <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
                        </div>
                        <button class="close z-index-1" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body px-card">
                        <h5 class="fs-0">Color Scheme</h5>
                        <p class="fs--1">Choose the perfect color mode for your app. </p>
                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                            <div class="btn btn-theme-default custom-control custom-radio custom-radio-success active">
                                <label class="cursor-pointer hover-overlay" for="theme-mode-default"><img class="w-100" src="<?php echo base_url('assets/img/generic/falcon-mode-default.jpg'); ?>" alt="" /></label>
                                <label class="cursor-pointer mb-0 d-flex justify-content-center pl-3" for="theme-mode-default">
                                    <input class="custom-control-input" id="theme-mode-default" type="radio" name="colorScheme" checked="checked" value="theme-mode-default" data-page-url="../index.html" /><span class="custom-control-label">Light</span>
                                </label>
                            </div>
                            <div class="btn btn-theme-dark custom-control custom-radio custom-radio-success">
                                <label class="cursor-pointer hover-overlay" for="theme-mode-dark"><img class="w-100" src="<?php echo base_url('assets/img/generic/falcon-mode-dark.jpg'); ?>" alt="" /></label>
                                <label class="cursor-pointer mb-0 d-flex justify-content-center pl-3" for="theme-mode-dark">
                                    <input class="custom-control-input" id="theme-mode-dark" type="radio" name="colorScheme" value="theme-mode-dark" data-page-url="../documentation/dark-mode.html" /><span class="custom-control-label">Dark</span>
                                </label>
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <div class="media flex-grow-1"><img class="mr-2" src="<?php echo base_url('assets/img/icons/left-arrow-from-left.svg'); ?>" width="20" alt="" />
                                <div class="media-body">
                                    <h5 class="fs-0">RTL Mode</h5>
                                    <p class="fs--1 mb-0">Switch your language direction </p>
                                </div>
                            </div>
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" id="mode-rtl" type="checkbox" data-home-url="../index.html" data-url="../documentation/RTL.html" />
                                <label class="custom-control-label" for="mode-rtl"> </label>
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <div class="media flex-grow-1"><img class="mr-2" src="<?php echo base_url('assets/img/icons/arrows-h.svg'); ?>" width="20" alt="" />
                                <div class="media-body">
                                    <h5 class="fs-0">Fluid Layout</h5>
                                    <p class="fs--1 mb-0">Toggle container layout system </p>
                                </div>
                            </div>
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" id="mode-fluid" type="checkbox" data-home-url="../index.html" data-url="../documentation/fluid-layout.html" />
                                <label class="custom-control-label" for="mode-fluid"> </label>
                            </div>
                        </div>
                        <hr />
                        <div class="media"><img class="mr-2" src="<?php echo base_url('assets/img/icons/paragraph.svg'); ?>" width="20" alt="" />
                            <div class="media-body">
                                <h5 class="fs-0 d-flex align-items-center">Navigation Position <span class="badge badge-pill badge-soft-success fs--2 ml-2">Updated</span></h5>
                                <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" checked="checked" data-page-url="../components/navbar/vertical.html" />
                                    <label class="custom-control-label" for="option-navbar-vertical">Vertical</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="option-navbar-top" type="radio" name="navbar" value="top" data-page-url="../components/navbar/top.html" />
                                    <label class="custom-control-label" for="option-navbar-top">Top</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mr-0">
                                    <input class="custom-control-input" id="option-navbar-combo" type="radio" name="navbar" value="combo" data-page-url="../components/navbar/combo.html" />
                                    <label class="custom-control-label" for="option-navbar-combo">Combo</label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
                        <p class="fs--1">Switch between styles for your vertical navbar </p>
                        <div class="btn-group-toggle btn-block btn-group-navbar-style" data-toggle="buttons">
                            <div class="btn-group btn-block">
                                <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2 active">
                                    <label class="cursor-pointer w-100" for="navbar-style-transparent"><img class="w-100" src="<?php echo base_url('assets/img/generic/default.png'); ?>" alt="" /></label>
                                    <label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-transparent">
                                        <input class="custom-control-input" id="navbar-style-transparent" type="radio" name="navbarVertical" checked="checked" data-page-url="../index.html" value="transparent" /><span class="custom-control-label"> Transparent</span>
                                    </label>
                                </div>
                                <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2">
                                    <label class="cursor-pointer w-100" for="navbar-style-inverted"><img class="w-100" src="<?php echo base_url('assets/img/generic/inverted.png'); ?>" alt="" /></label>
                                    <label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-inverted">
                                        <input class="custom-control-input" id="navbar-style-inverted" type="radio" name="navbarVertical" data-page-url="../layouts/navbar-vertical-inverted.html" value="inverted" /><span class="custom-control-label"> Inverted</span>
                                    </label>
                                </div>
                            </div>
                            <div class="btn-group btn-block mt-3">
                                <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2">
                                    <label class="cursor-pointer w-100" for="navbar-style-card"><img class="w-100" src="<?php echo base_url('assets/img/generic/card.png'); ?>" alt="" /></label>
                                    <label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-card">
                                        <input class="custom-control-input" id="navbar-style-card" type="radio" name="navbarVertical" data-page-url="../layouts/navbar-vertical-card.html" value="card" /><span class="custom-control-label"> Card</span>
                                    </label>
                                </div>
                                <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2">
                                    <label class="cursor-pointer w-100" for="navbar-style-vibrant"><img class="w-100" src="<?php echo base_url('assets/img/generic/vibrant.png'); ?>" alt="" /></label>
                                    <label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-vibrant">
                                        <input class="custom-control-input" id="navbar-style-vibrant" type="radio" name="navbarVertical" data-page-url="../layouts/navbar-vertical-vibrant.html" value="vibrant" /><span class="custom-control-label"> Vibrant</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="text-center mt-5"><img class="mb-4" src="<?php echo base_url('assets/img/illustrations/settings.png'); ?>" alt="" width="120" />
                            <h5>Like What You See?</h5>
                            <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
            <div class="modal-dialog mt-6" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header px-5 text-white position-relative modal-shape-header">
                        <div class="position-relative z-index-1">
                            <div>
                                <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                                <p class="fs--1 mb-0">Please create your free Falcon account</p>
                            </div>
                        </div>
                        <button class="close text-white position-absolute t-0 r-0 mt-1 mr-1" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body py-4 px-5">
                        <form>
                            <div class="form-group">
                                <label for="modal-auth-name">Name</label>
                                <input class="form-control" type="text" id="modal-auth-name" />
                            </div>
                            <div class="form-group">
                                <label for="modal-auth-email">Email address</label>
                                <input class="form-control" type="email" id="modal-auth-email" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="modal-auth-password">Password</label>
                                    <input class="form-control" type="password" id="modal-auth-password" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-auth-confirm-password">Confirm Password</label>
                                    <input class="form-control" type="password" id="modal-auth-confirm-password" />
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="modal-auth-register-checkbox" />
                                <label class="custom-control-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Register</button>
                            </div>
                        </form>
                        <div class="w-100 position-relative mt-5">
                            <hr class="text-300" />
                            <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row no-gutters">
                                <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                                <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="<?php echo site_url('assets/js/config.navbar-vertical.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/@fortawesome/all.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/stickyfilljs/stickyfill.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/sticky-kit/sticky-kit.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/is_js/is.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/lodash/lodash.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/select2.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/lib/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>

<!--<script src="assets/js/theme.js"></script>-->

<script>
$(function(){
    /*
    * --------------------------------------------------------------------
    * Select2 Define
    * --------------------------------------------------------------------
    */
    $('.select2').select2({
        theme: 'bootstrap4',
        allowClear: true
    });




    /*
    * --------------------------------------------------------------------
    * Select2 Ajax Define
    * --------------------------------------------------------------------
    */
    $(".select2-post").select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
          dataType: "json",
          type: "GET",
          data: function (params) {
            return {q: params.term};
          },
          processResults: function (data) {
            console.log(data)
            return {results: data};
          },
          cache: true,
        },
        minimumInputLength: 2
    });
});
</script>
<?php $this->renderSection("javascript"); ?>

</body>

</html>