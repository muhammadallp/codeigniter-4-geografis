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
<!-- <body> -->
<form action="/barangbekas/save" method="post" enctype="multipart/form-data">
<td align="left" valign="top"><input id="lat" type="hidden" name="latitude" /></td>

<td align="left" valign="top"><input id="lng" type="hidden" name="longitude" /></td>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"

 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="

 crossorigin="" />

<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"

 integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="

 crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> -->


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<div id="map" style="width: 100%; height: 90vh;"></div>
<script>


var map = L.map('map').setView([-1.3490088,100.5765809], 13);



  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
   

  function putDraggable() {

  
   
   draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}) .bindPopup(' <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data </button>').addTo(map);




   draggableMarker.on('dragend', function(e) {

    $("#lat").val(this.getLatLng().lat);

    $("#lng").val(this.getLatLng().lng);

   });

  }

  $( document ).ready(function() {

   putDraggable();

  });
  
  

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
                <!-- <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="latitude" placeholder="name@example.com" required/>
                    <label for="latitude" value="latitude">Latitude </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="longitude" placeholder="name@example.com" required/>
                    <label for="latitude" value="">Longitude </label>
                </div> -->
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