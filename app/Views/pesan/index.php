<?php $session = session(); ?>
    
 <?= $this->extend('pages/template'); ?> 

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">


    <form action="/user/proses_order" method="post" enctype="multipart/form-data">
<td align="left" valign="top"><input id="lat" type="hidden" name="latitude" /></td>

<td align="left" valign="top"><input id="lng" type="hidden" name="longitude" /></td>
 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

// var map = L.map('map').setView([-1.3490088,100.5765809], 10);
let latLng=[-1.3490088,100.5765809];
var map = L.map('map').setView(latLng, 15);
let centerMap=false;
var Layer =L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
});
map.addLayer(Layer);




getLocation();
setInterval(() => {
  getLocation();
}, 5000);
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
    // console.log('Router sekarang',position.coords.latitude,position.coords.longitude)
	$("[name=latitude]").val(position.coords.latitude);
	$("[name=longitude]").val(position.coords.longitude);
  let latLng=[position.coords.latitude,position.coords.longitude];
  control.spliceWaypoints(0, 1, latLng);
  if(centerMap==false){
  map.panTo(latLng);
    centerMap =true;
  }
	}

  var toko = L.icon({
    iconUrl: '<?=base_url('/assets/image/rongsokan.png')?>',

    iconSize:     [30, 65], // size of the icon
});

<?php foreach($barangbekas as $p): ?> 
L.marker([<?= $p['latitude']; ?>,<?=$p['longitude']; ?>],{icon: toko}).addTo(map)
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
      latLng
        // L.latLng(-1.321203, 100.560087),
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
        <h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="/user/proses_order" enctype="multipart/form-data">
                <?= csrf_field(); ?>
           <div class="form-floating mb-3">
                <input type="text" class="form-control " name="nama_pen" placeholder="name@example.com" autofocus required/>
                <label for="nama" >Nama </label>
                <div class="invalid-feedback">
                </div>
                </div>
                <?php foreach($barangbekas as $row):?>
                <input type="hidden" name="id_toko" value="<?= $row['id']; ?>" />
                <?php endforeach;?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nohp_pel" placeholder="name@example.com" required/>
                    <label for="nohp">Nomor Handphone </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="berat" placeholder="name@example.com" required/>
                    <label for="berat">Berat </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="latitude" placeholder="name@example.com" disabled/>
                    <label for="latitude">Latitude </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="longitude" placeholder="name@example.com" disabled/>
                    <label for="longitude">Longitude </label>
                </div>

                <div class="form-floating mb-4" id="main" data-loading="true">
                <select class="form-select" name="product_category"  id="floatingSelect" aria-label="Floating label select example">
                   <option selected>Open this select menu</option>
                        <?php foreach($product as $row):?>
                        <option value="<?= $row->product_id;?>"><?= $row->product_name;?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect"> Produk</label>
                </div>

                


            



              
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" >
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