<div class="card card-primary card-outline shadow-lg">
    <div class="card-header">
        <h3 class="card-title">Data Jabatan</h3>
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
                <th>Jabatan.</th>
                <th width="150px">Aksi</th>
            </tr>
            <?php 
    $no = 1;
    foreach($jabatan as $key=>$value) { ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$value['nama_jabatan']?></td>
                <td>
                    <button class="btn btn-sm btn-flat btn-warning" data-toggle="modal"
                        data-target="#edit<?=$value['id_jabatan']?>"><i class="fas fa-pencil-alt"></i></button>
                    <a href="<?=base_url('Jabatan/deleteData/' .$value['id_jabatan'] )?>" onclick="return confirm('Yakin akan mengahpis data ini')" class="btn btn-sm btn-flat btn-danger"><i class="fas fa-trash"></i></a>
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
                <h4 class="modal-title">Tambah Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Jabatan/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
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
<?php foreach($jabatan as $key=>$value) { ?>
    <div class="modal fade show" id="edit<?=$value['id_jabatan']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('Jabatan/updateData/' .$value['id_jabatan']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <input type="text" value=<?=$value['nama_jabatan']?> name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
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
<?php } ?>