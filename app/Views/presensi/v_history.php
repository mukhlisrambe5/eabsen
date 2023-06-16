<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?=base_url('Home')?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?=$judul?></div>
    <div class="right"></div>
</div>

<div class="row" style="margin-top:70px; margin-left:1px ; margin-right:1px; margin-bottom:65px">
    <div class="col">
        <?php 
        $errors= validation_errors();
        ?>
        <div class="form-group">
            <label for="">Bulan </label>
            <select name="bulan" id="bulan" class="form-control">
                <option value="">--Pilih--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            
        </div>

        <div class="form-group">
            <label for="">Tahun </label>
            <select name="tahun" id="tahun" class="form-control">
            <option value="">--Pilih Tahun--</option>

                <?php for($i=date('Y'); $i>=date('Y') -2; $i--) { ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php } ?>
            </select>

        </div>

       
        <button class="btn btn-primary btn-block" onclick="ViewHistory()"><i class="fas fa-search mr-1"></i> View</button>
    </div>

    <div class="col-sm-12">
    <hr>
    <div class="History"></div>
    
</div>
<script>
    function ViewHistory()
    {
        let bulan = $('#bulan').val();
        // let bulan = "6";

        let tahun = $('#tahun').val();
        // let tahun ="2023";
        if(bulan ==""){
            Swal.fire('Bulan belum dipilih!');
        }else if(tahun =="")
        {
            Swal.fire('Tahun belum dipilih');
        }else{
            $.ajax({
                type: "POST",
                url: "<?=base_url('Home/viewHistory')?>",
                data: {
                    bulan: bulan,
                    tahun:tahun,
                },
                dataType: "JSON",
                success: function (response) {
                    $('.History').html(response.data);
                }
            });
           
        }
    }
</script>