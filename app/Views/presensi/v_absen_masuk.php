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
    <div class="col">
        <style>
        .my_camera,
        .my_camera video {
            display: inline-block;
            width: 100% !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;
        }
        </style>
        <div class="my_camera"></div>
        <button class="btn btn-primary btn-block btn-flat" id="takeAbsen"><i class="fas fa-camera"
                style="margin-right: 0.5em"></i>
            Absen Masuk</button>
        <input type="hidden" name="lokasi" id="lokasi">
        <div id="map" style="width:100%; height: 400px"></div>
        <audio src="<?=base_url('public/sound/absenmasuk.mp3')?>" id="notifikasi_in" type="audio/mpeg"></audio>
    </div>
</div>
<script>
var notifikasi_in = document.getElementById('notifikasi_in');

Webcam.set({
    width: 420,
    height: 340,
    image_format: 'jpeg',
    jpeg_quality: 90,
});
Webcam.attach('.my_camera');

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
} else {
    // document.getElementById("demo").innerHTML =
    //     "Geolocation is not supported by this browser.";
    alert("Geolocation is not supported by this browser.");
}

function showPosition(position) {
    var x = document.getElementById('lokasi');
    x.value = position.coords.latitude + "," + position.coords.longitude;

    var userLocation = L.latLng(position.coords.latitude, position.coords.longitude);

    // menampilkan map dan posisi karyawan
    var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 17);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

    //radius kantor
    var circle = L.circle([<?=$kantor["lokasi_kantor"]?>], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: <?=$kantor["radius"]?> //radius dalam meter
        //radius dalam meter
    }).addTo(map);

    // posisi kantor

    var kantorIcon = L.icon({
        iconUrl: '<?=base_url("public")?>/image/kantor.png',
        // shadowUrl: 'leaf-shadow.png',

        iconSize: [38, 95], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([<?=$kantor["lokasi_kantor"]?>], {
            icon: kantorIcon
        }).addTo(map)
        .bindPopup('Kantor')
        .openPopup();

        //hitung jarak posisi kantor dengan user
        var distance =  userLocation.distanceTo(circle.getLatLng());
        if(distance > circle.getRadius()){
            // alert('Anda berada di luar zona absen');
            Swal.fire({
                icon: 'error',
                title: 'Peringatan !',
                text: 'Lokasi Anda terlalu jauh dari kantor. Anda harus berada dalam radius yang ditentukan',
                showConfirmButton: false,
                footer: '<a class="btn btn-success" href="<?=base_url('Home')?>">OK</a>'
            });
            document.getElementsByTagName("button")[0].disabled =true;
        }  
}
$('#takeAbsen').click(function(e) {
    Webcam.snap(function(data_uri) {
        image = data_uri;
    });
    notifikasi_in.play();
    var lokasi = $('#lokasi').val();
    $.ajax({
        type: "POST",
        url: "<?=base_url('Presensi/insertPresensiIn')?>",
        data: {
            image: image,
            lokasi: lokasi
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil !',
                text: 'Selamat Bekerja',
                showConfirmButton: false,
                footer: '<a class="btn btn-success" href="<?=base_url('Home')?>">OK</a>'
            })
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
});
</script>