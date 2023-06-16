<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Absensi | <?=$judul?></title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallpublic/back">

    <link rel="stylesheet" href="<?=base_url('public/back')?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?=base_url('public/back')?>/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script nonce="10f99583-7f88-4d79-96e7-d7280465f279">
    (function(w, d) {
        ! function(a, b, c, d) {
            a[c] = a[c] || {};
            a[c].executed = [];
            a.zaraz = {
                deferred: [],
                listeners: []
            };
            a.zaraz.q = [];
            a.zaraz._f = function(e) {
                return function() {
                    var f = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: f
                    })
                }
            };
            for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
            a.zaraz.init = () => {
                var h = b.getElementsByTagName(d)[0],
                    i = b.createElement(d),
                    j = b.getElementsByTagName("title")[0];
                j && (a[c].t = b.getElementsByTagName("title")[0].text);
                a[c].x = Math.random();
                a[c].w = a.screen.width;
                a[c].h = a.screen.height;
                a[c].j = a.innerHeight;
                a[c].e = a.innerWidth;
                a[c].l = a.location.href;
                a[c].r = b.referrer;
                a[c].k = a.screen.colorDepth;
                a[c].n = b.characterSet;
                a[c].o = (new Date).getTimezoneOffset();
                if (a.dataLayer)
                    for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                            ...o[1],
                            ...p[1]
                        })), {}))) zaraz.set(n[0], n[1], {
                        scope: "page"
                    });
                a[c].q = [];
                for (; a.zaraz.q.length;) {
                    const q = a.zaraz.q.shift();
                    a[c].q.push(q)
                }
                i.defer = !0;
                for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith(
                    "_zaraz_"))).forEach((s => {
                    try {
                        a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                    } catch {
                        a[c]["z_" + s.slice(7)] = r.getItem(s)
                    }
                }));
                i.referrerPolicy = "origin";
                i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                h.parentNode.insertBefore(i, h)
            };
            ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <?php
      $db=\Config\Database::connect();
      $user = $db->table('tbl_user')->where('id_user', session()->get('id_user'))->get()->getRowArray();
    ?>
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Auth/logOut')?>">
                        <i class="fas fa-sign-out-alt"> Log Out</i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="<?=base_url('Admin')?>" class="brand-link">
                <img src="<?=base_url('public/back')?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Absensi</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?=base_url('public/image')?>/<?=$user['foto_user']?>" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=$user['username']?></a>
                    </div>
                </div>

                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('Jabatan')?>" class="nav-link <?=$menu =="jabatan" ? 'active': ''?>">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    Jabatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('Karyawan')?>" class="nav-link <?=$menu =="karyawan" ? 'active': ''?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Starter Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('Admin/setting')?>" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?=$judul?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <?php
                        if($page){
                                echo view($page);
                        }
                ?>
                </div>
            </div>
        </div>


        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>



    <script src="<?=base_url('public/back')?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?=base_url('public/back')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?=base_url('public/back')?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>