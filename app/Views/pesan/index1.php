<?php $session = session(); ?>
    
 <?= $this->extend('pages/templateadmin'); ?> 

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
<!-- <style>

    body{
        margin-top:50px;
    }
    </style> -->

    <div class="row">
		 <input type='text' value='' name='latitude'/>
 <input type='text' value='' name='longitude'/>
		<div class="col-md-4">
			<button class="dariSini btn btn-info"><i class="fa fa-map-marker"></i> Mulai dari Posisi Kita</button>
		</div>
	</div>
<!-- <body> -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> -->


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script src="<?=base_url('assets/js/Control.Geocoder.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet-search.src.js')?>"></script>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<div id="map" style="width: 100%; height: 90vh;"></div>
<script>

var map = L.map('map').setView([-1.3490088,100.5765809], 10);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


// getLocation();
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//     $("input[name='latitude']").val(position.coords.latitude);
//     $("input[name='longitude']").val(position.coords.longitude);
// }



<?php foreach($barangbekas as $p): ?> 
L.marker([<?= $p['latitude']; ?>,<?=$p['longitude']; ?>]).addTo(map)
.bindPopup('<div class="card text-center" style="width: 10rem; "><img src="/assets/image/barangbekas/<?= $p['image'];?>" class="card-img-top"><div class="card-body"> <?= $p['nama']; ?></p><button class ="btn btn-primary" onclick="return keSini(<?= $p['latitude']; ?>,<?=$p['longitude']; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" >Pesan</button></div> </div>' );

<?php endforeach; ?>

// L.Routing.control({
//     waypoints: [
//         L.latLng(-1.357607, 100.575680),
//         L.latLng(-1.349562, 100.573324)
//     ]
// }).addTo(map);

var control= L.Routing.control({
    waypoints: [
        L.latLng(-1.321203, 100.560087),
        // L.latLng(-1.349562, 100.573324)
    ],
    
    routeWhileDragging: true
})
control.addTo(map);

function keSini(lat,Lng) {
    var latLng=L.latLng(lat,Lng)
    control.spliceWaypoints(control.getWaypoints().length - 1, 1,latLng);
    
}


</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="/barangbekas/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
           <div class="form-floating mb-3">
                <input type="text" class="form-control " name="nama" placeholder="name@example.com" autofocus required/>
                <label for="nama" >Nama Toko</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nohp" placeholder="name@example.com" required/>
                    <label for="latitude">Nomor Handphone </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="latitude" placeholder="name@example.com" required/>
                    <label for="latitude">Latitude </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="longitude" placeholder="name@example.com" required/>
                    <label for="latitude">Longitude </label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="image" >
                    <div class="invalid-feedback">
                    </div>
                </div>
           </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
      




</div>

</main>
</div>
<?= $this->endSection(); ?>