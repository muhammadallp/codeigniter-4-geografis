<?php $session = session(); ?>
    
 <?= $this->extend('pages/templateadmin'); ?> 

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">


    <!-- <form action="/user/proses_order" method="post" enctype="multipart/form-data"> -->
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
    console.log('Router sekarang',position.coords.latitude,position.coords.longitude)
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
    iconUrl: '<?=base_url('/assets/image/marker.png')?>',

    iconSize:     [25, 60], // size of the icon
});

<?php foreach($pelanggan as $p): ?> 
L.marker([<?= $p->latitude_pel; ?>,<?=$p->longitude_pel; ?>],{icon: toko}).addTo(map)
.bindPopup('<div class="card text-center" style="width: 10rem; "><div class="card-body"> <?= $p->nama_pen; ?></p><?= $p->nohp_pel; ?><br><br><button class ="btn btn-primary" onclick="return keSini(<?= $p->latitude_pel; ?>,<?=$p->longitude_pel; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" >Kesini</button></div> </div>' );

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



</div>

</main>
</div>
<?= $this->endSection(); ?>