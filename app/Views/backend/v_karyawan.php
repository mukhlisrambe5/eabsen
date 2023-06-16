<div class="card card-primary card-outline shadow-lg">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add"><i
                    class="fas fa-plus"> Tambah</i>
            </button>
        </div>

    </div>

    <!-- modal tambah -->
    <div class="card-body">
        <?php
            if(session()->get('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->get('pesan');
                echo "</h5></div>";
            }
        ?>
        <table class="table table-sm table-bordered">
            <tr class="text-center">
                <th width="50px">No.</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Foto</th>

                <th width="150px">Aksi</th>
            </tr>
            <?php 
    $no = 1;
    foreach($karyawan as $key=>$value) { ?>
            <tr>
                <td class="text-center"><?=$no++;?></td>
                <td class="text-center"><?=$value['nik']?></td>
                <td><?=$value['nama_karyawan']?></td>
                <td><?=$value['nama_jabatan']?></td>
                <td><?=$value['username']?></td>
                <td class="text-center"><img src="<?=base_url('public/image/' .$value['foto_karyawan'])?>" width="100px"
                        alt="foto"></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-flat btn-warning" data-toggle="modal"
                        data-target="#edit<?=$value['id_karyawan']?>"><i class="fas fa-pencil-alt"></i></button>
                    <a href="<?=base_url('Karyawan/deleteData/' .$value['id_karyawan'] )?>"
                        onclick="return confirm('Yakin akan menghapus data ini')"
                        class="btn btn-sm btn-flat btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

<!-- modal add -->
<div class="modal fade show" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('Karyawan/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required>
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <select name="id_jabatan" id="" class="form-control">
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach($jabatan as $key=>$value) { ?>
                        <option value="<?=$value['id_jabatan']?>"><?=$value['nama_jabatan']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" value="123456" name="password" class="form-control" placeholder="Password"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Foto Karyawan</label>
                    <input type="file" name="foto_karyawan" accept="image/*" class="form-control" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>

    </div>

</div>

<!-- modal edit -->
<?php foreach($karyawan as $key=>$data) { ?>
<div class="modal fade show" id="edit<?=$data['id_karyawan']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('Karyawan/updateData/' .$data['id_karyawan']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" value="<?=$data['nama_karyawan']?>" class="form-control" placeholder="Nama Karyawan" required>
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="nik" value="<?=$data['nik']?>" class="form-control" placeholder="NIK" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <select name="id_jabatan" id="" class="form-control">
                        <?php foreach($jabatan as $key=>$value) { ?>
                        <option value="<?=$value['id_jabatan']?>" <?=$data['id_jabatan']==$value['id_jabatan'] ? 'selected' : ''?>><?=$value['nama_jabatan']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?=$data['username']?>" class="form-control" placeholder="Username" required>
                </div>
                
                <div class="form-group">
                    <label for="">Ganti Foto Karyawan</label>
                    <input type="file" name="foto_karyawan" accept="image/*" class="form-control">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        
        <?= form_close() ?>
    </div>

</div>

</div>
<?php } ?>