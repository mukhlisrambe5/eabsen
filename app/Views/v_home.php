    <div class="section bg-primary" id="user-section">
      <div id="user-detail">
        <div class="avatar">
          <img src="<?=base_url('public')?>/image/foto.jpeg" alt="avatar" class="imaged w86 rounded" />
        </div>
        <div id="user-info">
          <h2 id="user-name"><?=$karyawan['nama_karyawan']?></h2>
          <span id="user-role"><?=$karyawan['nama_jabatan']?></span>
        </div>
      </div>
    </div>

    <div class="section" id="menu-section">
      <div class="card">
        <div class="card-body text-center">
          <div class="list-menu">
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="" class="green" style="font-size: 40px"><i class="fas fa-user"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Profil</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="" class="danger" style="font-size: 40px">
                  <i class="fas fa-calendar-alt"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Cuti</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="" class="warning" style="font-size: 40px">
                  <i class="fas fa-file-alt"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Histori</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="" class="orange" style="font-size: 40px">
                  <i class="fas fa-map-marker-alt"></i>
                </a>
              </div>
              <div class="menu-name">Lokasi</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section mt-2" id="presence-section">
      <div class="todaypresence">
        <div class="row">
          <div class="col-6">
            <div class="card bg-success">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence">
                    <i class="fas fa-clock"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="presencetitle">Masuk</h4>
                    <span>
                      <?=$presensi ==null ? "--:--:--" : $presensi["jam_in"]?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card bg-danger">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence">
                    <i class="fas fa-clock"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="presencetitle">Pulang</h4>
                    <span>
                    <?php
                      if($presensi ==null){
                        echo "--:--:--";
                      }else{
                        if($presensi['lokasi_out']== null or $presensi['foto_out']== null){
                          echo "--:--:--";
                        }else{
                          echo $presensi['jam_out'];
                        }
                      }
                    ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="rekappresence mt-1">
        <div class="col">
          <canvas id="myChart" style="min-height: 460px; height: 460px; max-height: 460px; max-width: 100%;"></canvas>
        </div>
      </div>

      <div class="rekappresence mt-1">

        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence primary">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Hadir</h4>
                    <span class="rekappresencedetail">0 Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence green">
                    <i class="fas fa-info"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Izin</h4>
                    <span class="rekappresencedetail">0 Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence danger">
                    <i class="fas fa-sad-tear"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Sakit</h4>
                    <span class="rekappresencedetail">0 Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence warning">
                    <i class="fa fa-clock"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Terlambat</h4>
                    <span class="rekappresencedetail">0 Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="presencetab mt-2">
        <div class="tab-pane fade show active" id="pilled" role="tabpanel">
          <ul class="nav nav-tabs style1" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                Bulan Ini
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                Leaderboard
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content mt-2" style="margin-bottom: 100px">
          <div class="tab-pane fade show active" id="home" role="tabpanel">
            <ul class="listview image-listview">
              <?php foreach($history as $key=>$value) { ?>
                <li>
                <div class="item">
                  <div class="icon-box bg-primary">
                    <i class="fas fa-fingerprint"></i>
                  </div>
                  <div class="in">
                    <div><?=date('d-m-Y', strtotime($value['tgl_presensi']))?></div>
                    <div>
                      <span class="badge badge-success"><?=$value['jam_in']?></span>
                      <span class="badge badge-danger"><?=$value['jam_out'] == '00:00:00' ? '--:--:--' : $value['jam_out'] ?></span>
                    </div>

                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
            
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel">
            <ul class="listview image-listview">
              <?php foreach($leaderboard as $key => $value) { ?>
                <li>
                <div class="item">
                  <img src="<?=base_url('public/image/' .$value['foto_karyawan'])?>" alt="image" class="image" />
                  <div class="in">
                    <div><?=$value['nama_karyawan']?> <br>
                      <small><?=$value['nama_jabatan']?></small>
                    </div>
                    <div>
                    <span class="badge badge-success"><?=$value['jam_in']?></span>
                    <span class="badge badge-danger"><?=$value['jam_out'] == '00:00:00' ? '--:--:--' : $value['jam_out'] ?></span>
                    </div>
                  </div>
                </div>
              </li>
              <?php } ?>
              
             
            </ul>
          </div>
          <div class="tab-content mt-2" style="margin-bottom:100px">
              <a href="<?=base_url('Auth/logout')?>" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt" style="margin-right:0.5em"></i>  Logout</a>
            </div>
        </div>
      </div>
    </div>
