<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> SMKOPP - <?= $page_title ?> </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?= base_url('css/vendor.css') ?>">
        <link rel="stylesheet" id="theme-style" href="<?= base_url('css/app-blue.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.dataTables.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/dataTables.blue.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/select2.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/daterangepicker.css') ?>" />
        <style type="text/css">
            form label, form .form-control, .btn, .dataTables_wrapper, .select2, .select2-results__option, .input-group-text {
                font-size: 14px
            }
            [data-number] {text-align: right;}
            .btn {color: #fff !important}
            .btn-oval{padding: 2px 4px; font-size: 12px}
            .hidden{display: none;}
            .form-spj .form-group {margin-bottom: 2px}
            .form-child [class^="col-sm-"] {margin-bottom: 5px}
            .btn-delete[data-uuid], .btn-detail {margin-top: 5px}
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-buttons">
                      <span class="error-placeholder btn btn-sm header-btn <?= !$error?'hidden':'' ?>" style="color: white; background-color: #197b30">
                        <i class="fa fa-exclamation-triangle"></i>
                        <span class="error-message"><?= $error ? $error : '' ?></span>
                      </span>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="name"> <?= $this->session->userdata('nama') ?> </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform; font-size: 12px">
                                    <a class="dropdown-item" href="<?= site_url("ChangePassword/read/{$this->session->userdata('uuid')}") ?>">
                                        <i class="fa fa-key icon"></i> Change Password
                                    </a>
                                    <a class="dropdown-item" href="<?= site_url('Login/Logout') ?>">
                                        <i class="fa fa-power-off icon"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand" style="font-size: 28px">
                                <img src="<?= base_url('images/logo.png') ?>" width="40" height="50">
                                SMK<i style="color:#ff9800">OPP</i>
                            </div>
                        </div>

                        <?php include APPPATH . 'views/menu.php' ?>

                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4"> </div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li>
                                                    <span class="color-item color-red" data-theme="red"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-orange" data-theme="orange"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-green active" data-theme=""></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-blue" data-theme="blue"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-purple" data-theme="purple"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <!-- <a href=""><i class="fa fa-cog"></i> Customize </a> -->
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <?php include "{$page_name}.php" ?>
                <footer class="footer">
                    <div class="footer-block buttons">
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li> created by
                                <a href="https://github.com/modularcode">ModularCode</a>
                            </li>
                            <li>
                                <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script type="text/javascript" src="<?= base_url('js/vendor.js') ?>"></script>
        <script type="text/javascript">
            $('.error-placeholder').click(function () {
                $(this).slideUp()
            })
            $('#sidebar-menu, #customize-menu').metisMenu({activeClass: 'open'})
            $('#sidebar-collapse-btn').on('click', function(event){
                event.preventDefault()
                $("#app").toggleClass("sidebar-open")
            })
            $("#sidebar-overlay").on('click', function() {
                $("#app").removeClass("sidebar-open")
            })
            if ($.browser.mobile) {
                var $appContainer = $('#app ')
                var $mobileHandle = $('#sidebar-mobile-menu-handle ')
                $mobileHandle.swipe({
                    swipeLeft: function() {
                        if($appContainer.hasClass("sidebar-open")) {
                            $appContainer.removeClass("sidebar-open")
                        }
                    },
                    swipeRight: function() {
                        if(!$appContainer.hasClass("sidebar-open")) {
                            $appContainer.addClass("sidebar-open")
                        }
                    },
                    triggerOnTouchEnd: false
                })
            }

            function showError (msg) {
                $('.error-message').html(msg)
                $('.error-placeholder').slideDown()
            }

            var site_url = '<?= site_url('/') ?>'
            var current_controller = '<?= site_url ($current['controller']) ?>'

            var menu = $('nav.menu li')
            menu.removeClass('active')
            menu.has('a[href="'+current_controller+'/"]').addClass('active')
            if (menu.has('a[href="'+current_controller+'/"]').length < 1)menu.eq(0).addClass('active')
        </script>
        <?php if ('table' === $page_name): ?>
            <script type="text/javascript" src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
            <script type="text/javascript">
                var thead = <?= json_encode ($thead) ?>
            </script>
            <script type="text/javascript" src="<?= base_url('js/table.js') ?>"></script>
        <?php elseif (in_array($page_name, array('form', 'form-jabatan-assignment'))): ?>
            <script type="text/javascript" src="<?= base_url('js/select2.full.min.js') ?>"></script>
            <script type="text/javascript" src="<?= base_url('js/bootstrap-datepicker.js') ?>"></script>
            <script type="text/javascript" src="<?= base_url('js/moment.min.js') ?>"></script>
            <script type="text/javascript" src="<?= base_url('js/daterangepicker.min.js') ?>"></script>
            <script type="text/javascript" src="<?= base_url('js/form.js') ?>"></script>
        <?php elseif (in_array($page_name, array('list','breakdown-list'))): ?>
            <script type="text/javascript" src="<?= base_url('js/list.js') ?>"></script>
            <script type="text/javascript" src="<?= base_url('js/bootbox.min.js') ?>"></script>
        <?php endif ?>
    </body>
</html>