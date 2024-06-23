<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Absensi| Login</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('back') ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('back') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url('back') ?>/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="e39644b6-8c40-4daa-92b4-d74ea75b67d2">
        (function (w, d) {
            ! function (Y, Z, _, ba) {
                Y[_] = Y[_] || {};
                Y[_].executed = [];
                Y.zaraz = {
                    deferred: [],
                    listeners: []
                };
                Y.zaraz.q = [];
                Y.zaraz._f = function (bb) {
                    return function () {
                        var bc = Array.prototype.slice.call(arguments);
                        Y.zaraz.q.push({
                            m: bb,
                            a: bc
                        })
                    }
                };
                for (const bd of ["track", "set", "debug"]) Y.zaraz[bd] = Y.zaraz._f(bd);
                Y.zaraz.init = () => {
                    var be = Z.getElementsByTagName(ba)[0],
                        bf = Z.createElement(ba),
                        bg = Z.getElementsByTagName("title")[0];
                    bg && (Y[_].t = Z.getElementsByTagName("title")[0].text);
                    Y[_].x = Math.random();
                    Y[_].w = Y.screen.width;
                    Y[_].h = Y.screen.height;
                    Y[_].j = Y.innerHeight;
                    Y[_].e = Y.innerWidth;
                    Y[_].l = Y.location.href;
                    Y[_].r = Z.referrer;
                    Y[_].k = Y.screen.colorDepth;
                    Y[_].n = Z.characterSet;
                    Y[_].o = (new Date).getTimezoneOffset();
                    if (Y.dataLayer)
                        for (const bk of Object.entries(Object.entries(dataLayer).reduce(((bl, bm) => ({
                            ...bl[1],
                            ...bm[1]
                        })), {}))) zaraz.set(bk[0], bk[1], {
                            scope: "page"
                        });
                    Y[_].q = [];
                    for (; Y.zaraz.q.length;) {
                        const bn = Y.zaraz.q.shift();
                        Y[_].q.push(bn)
                    }
                    bf.defer = !0;
                    for (const bo of [localStorage, sessionStorage]) Object.keys(bo || {}).filter((bq => bq
                        .startsWith("_zaraz_"))).forEach((bp => {
                            try {
                                Y[_]["z_" + bp.slice(7)] = JSON.parse(bo.getItem(bp))
                            } catch {
                                Y[_]["z_" + bp.slice(7)] = bo.getItem(bp)
                            }
                        }));
                    bf.referrerPolicy = "origin";
                    bf.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(Y[_])));
                    be.parentNode.insertBefore(bf, be)
                };
                ["complete", "interactive"].includes(Z.readyState) ? zaraz.init() : Y.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('Auth/loginAdmin') ?>" class="h1"><b>E</b>Absensi</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login</p>
                <?php
                $errors = validation_errors();
                if (session()->get('pesan')) {
                    echo "<div class='alert alert-danger'>";
                    echo session()->get('pesan');
                    echo "</div>";
                }

                ?>

                <?php echo form_open('Auth/cekLoginUser') ?>
                <div class="input-group mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <p class="text text-danger">
                    <?= isset($errors['username']) == isset($errors['username']) ? validation_show_error('username') : '' ?>
                </p>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="text text-danger">
                    <?= isset($errors['password']) == isset($errors['password']) ? validation_show_error('password') : '' ?>
                </p>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <!-- <input type="checkbox" id="remember"> -->
                            <label for="remember">
                                <!-- Remember Me -->
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>

                </div>
                <?php echo form_close() ?>


                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>

        </div>

    </div>


    <script src="<?= base_url('back') ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('back') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('back') ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>