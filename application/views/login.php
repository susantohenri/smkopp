<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> SMKOPP - Login </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?= base_url('css/vendor.css') ?>">
        <link rel="stylesheet" id="theme-style" href="<?= base_url('css/app-blue.css') ?>">
    </head>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title" style="color: #ff9800">
                            <img src="<?= base_url('images/logo.png') ?>">
                            <br>
                            Sistem Monitoring Kinerja Pelayanan Operasional Pelabuhan
                            <br><small style="font-size: 14px">
                            Direktorat Jenderal Perhubungan Laut
                            </small>
                        </h1>
                    </header>
                    <div class="auth-content">
                        <form id="login-form" action="" method="POST" novalidate="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control underlined" name="username" id="username" placeholder="Username" required> </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="Password" required> </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    </body>
</html>