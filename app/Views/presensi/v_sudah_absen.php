<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?=base_url('Home')?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?=$judul?></div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<div class="row" style="margin-top:70px">
    <div class="col-sm-12 text-center">
        <i class="far fa-check-circle fa-7x text-success"> </i>
    </div>
    <div class="col-sm-12 text-center">
        <h3>Anda sudah absen hari ini !</h3>
    </div>
    <div class="col-sm-12 text-center">
        <h4><?= date('d F Y', strtotime($presensi['tgl_presensi']))?></h4>
        <h4 class="text-success">Masuk: <?=$presensi["jam_in"]?> WIB</h4>
        <h4 class="text-danger">Pulang: <?=$presensi["jam_out"]?> WIB</h4>
        <h2 class="text-primary">Selamat beristirahat !</h2>
    </div>
</div>