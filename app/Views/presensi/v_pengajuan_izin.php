<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?=base_url('Presensi/izin')?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?=$judul?></div>
    <div class="right"></div>
</div>

<div class="row" style="margin-top:70px; margin-left:1px ; margin-right:1px">
    <div class="col">
        <?php 
        $errors= validation_errors();
        ?>
        <?php echo form_open('Presensi/submitIzin') ?>
        <div class="form-group">
            <label for="">Tanggal </label>
            <input type="date" name="tgl_izin" class="form-control">
            <p class="text text-danger"><?=isset($errors['tgl_izin'])== isset($errors['tgl_izin']) ? validation_show_error('tgl_izin') : ''?></p>
            
        </div>

        <div class="form-group">
            <label for="">Status Izin </label>
            <select name="status_izin" id="" class="form-control">
                <option value="">--Pilih--</option>

                <option value="1">Izin</option>
                <option value="2">Sakit</option>
            </select>
            <p class="text text-danger"><?=isset($errors['status_izin'])== isset($errors['status_izin']) ? validation_show_error('status_izin') : ''?></p>

        </div>

        <div class="form-group">
            <label for="">Keterangan </label>
            <textarea name="ket_izin" id="" cols="30" rows="5" class="form-control"></textarea>
            <p class="text text-danger"><?=isset($errors['ket_izin'])== isset($errors['ket_izin']) ? validation_show_error('ket_izin') : ''?></p>
        </div>
        <button class="btn btn-primary btn-block">Submit</button>
        <?php echo form_close() ?>
    </div>
</div>