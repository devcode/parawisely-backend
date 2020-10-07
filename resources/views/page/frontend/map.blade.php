<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" type="text/css"
      href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <style>
        #mapid { min-height: 500px; }
    </style>
    <title>Map</title>
  </head>
  <body>


    <div class="card">
        <div class="col-md-12" style="position: absolute;margin-top: 10px;padding-right: 45px;padding-left:50px;">
            <div class="col-md-3 pull-right" style="z-index: 99999;background-color:rgba(255,255,255,0.5); padding-top: 10px; padding-right: 10px; ">
                <div class="form-group">
                    <select class="form-control" id="propinsi">
                        <option>Provinsi</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="kabupaten" style="display: none;">
                        <option value="">Kabupaten</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="kecamatan" style="display: none;">
                        <option value="">Kecamatan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body" id="mapid"></div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>
  <script type='text/javascript'
    src='https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js'></script>
  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.2.4/dist/esri-leaflet.js"
    integrity="sha512-tyPum7h2h36X52O2gz+Pe8z/3l+Y9S1yEUscbVs5r5aEY5dFmP1WWRY/WLLElnFHa+k1JBQZSCDGwEAnm2IxAQ=="
    crossorigin=""></script>
  <!-- Leaflet.FeatureGroup.SubGroup assets -->
  <script src="https://unpkg.com/leaflet.featuregroup.subgroup@1.0.2/dist/leaflet.featuregroup.subgroup.js"></script>


  <script>
    //define icon image locations
    var foodIcon = "{{ asset('backend/uploads/icon/food.png') }}",
        mountainIcon = "{{ asset('backend/uploads/icon/mountain.png') }}",
        oceanIcon = "{{ asset('backend/uploads/icon/ocean.png') }}",
        tempatIcon = "{{ asset('backend/uploads/icon/tempat.png') }}";

    //initialize variable
    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://www.kemdikbud.go.id/main/">Kemendikbud</a>  '
        }),
    latlng = L.latLng(-2.039833, 123.8244163);

    var map = L.map('mapid', {center: latlng, zoom: 4, layers: [tiles]});

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
        function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
                var m = L.marker(L.latLng(pos.lat, pos.lng)).bindPopup("You are within  meters from this point").openPopup();
                m.addTo(map)
                map.setZoom(13)
                map.panTo(new L.latLng(pos.lat, pos.lng))
            },
            function () {
            // handleLocationError(true, infoWindow, map.getCenter());
            console.log("cannot locate the map");
            }
        );
    } else {
    console.log("cannot locate the map");
    // Browser doesn't support Geolocation
    // handleLocationError(false, infoWindow, map.getCenter());
    }



    //define base icon features
    var MapIcon = L.Icon.extend({
        options: {
            iconSize: [25, 25],
            iconAnchor: [20, 35],
            popupAnchor: [2, -10]
        }
    });

    //define custom icons
    var Food = new MapIcon({
        iconUrl: foodIcon
    }),
    Mountain = new MapIcon({
        iconUrl: mountainIcon
    }),
    Ocean = new MapIcon({
        iconUrl: oceanIcon
    }),
    Tempat = new MapIcon({
        iconUrl: tempatIcon
    });

    //allows function to read json field and assign to icon url
    var icons = {
        "1": Food,
        "2": Mountain,
        "3": Ocean,
        "4": Tempat
    };

    var categories = [],
        category;
    var provinsi,kabupaten,kecamatan;

    // var layersControl = L.control.layers(null, null).addTo(map);
    var parentGroup = L.markerClusterGroup().addTo(map);

    //adding an array to hold all marker locations and names
    var bulk_list = [];

    //output sample names of points in the zoom box
    map.on("boxzoomend", function (e) {
        for (var i = 0; i < bulk_list.length; i++) {
            if (e.boxZoomBounds.contains(bulk_list.latlng[i])) {
                console.log(bulk_list.name[i]);
            }
        }
    });

    $('#propinsi').on('change',function(){
        if($(this).val() == null || $(this).val() == ''){
            $('#kabupaten').slideUp();
            $('#kecamatan').slideUp();
            $('#kabupaten').val('');
            console.log($('#kabupaten').val());
            $('#kecamatan').val('');
        }else{
            $('#kabupaten').slideDown();
            $('#kecamatan').slideUp();
        }
        set_val_provinsi();
        set_val_kabupaten();
        set_val_kecamatan();
        map_filtered();
    })

    $('#kabupaten').on('change',function(){
        if($(this).val() == null || $(this).val() == ''){
            $('#kecamatan').slideUp();
            $('#kecamatan').val('');
        }else{
            $('#kecamatan').slideDown();
        }
        set_val_provinsi();
        set_val_kabupaten();
        set_val_kecamatan();
        map_filtered();
    })

    $('#kecamatan').on('change',function(){
        set_val_provinsi();
        set_val_kabupaten();
        set_val_kecamatan();
        map_filtered();
    });

    map_filtered()
    function map_filtered(){
        parentGroup.clearLayers();
        $.ajax({
            url:'{{ url('/mapData') }}',
            type:"get",
            dataType:"json",
            data:{
                provinsi : get_val_provinsi(),
                kabupaten : get_val_kabupaten(),
                kecamatan : get_val_kecamatan()
            },
            success:function(json){
                var last = {};
                json.forEach(element => {
                    var title = element.name_place;
                    var m = L.marker(L.latLng(element.latitude, element.longitude),{icon:icons[element.type_id]}, { title: title });
                    map.setZoom(13);
                    m.bindPopup(title);
                    parentGroup.addLayer(m);
                    categories.push(m);
                    last = element;
                });
                map.panTo(new L.latLng(last.latitude, last.longitude))
            },
            error:function(x,y,z){
                alert('Terjadi Sebuah Kesalahan');
            }
        });
        return false;
    }
    function get_val_provinsi(){
        return provinsi;
    }

    function get_val_kabupaten(){
        return kabupaten;
    }

    function get_val_kecamatan(){
        return kecamatan;
    }

    function set_val_provinsi(){
        provinsi = $('#propinsi').val();
    }

    function set_val_kabupaten(){
        kabupaten = $('#kabupaten').val();
    }

    function set_val_kecamatan(){
        kecamatan = $('#kecamatan').val();
    }
</script>
<script type="text/javascript">
    var return_first = function () {
        var tmp = "sZximLbjUzVrwGXySzdOe9M19AFenHzToxM4z5azIZYuXEt4wV";
        return tmp;
    }();
    $(document).ready(function () {
        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
            type: 'GET',
            dataType: 'json',
            success: function (json) {
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                    }
                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
            }
        });
        $("#propinsi").change(function () {
            var propinsi = $("#propinsi").val();
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                data: "idpropinsi=" + propinsi,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $("#kabupaten").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                        }
                        $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                        $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
        });
        $("#kabupaten").change(function () {
            var kabupaten = $("#kabupaten").val();
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
                data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $("#kecamatan").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                        }
                        $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                    } else {
                        $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
        });
        $("#kecamatan").change(function () {
            var kecamatan = $("#kecamatan").val();
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
                data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
                type: 'GET',
                dataType: 'json',
                cache: false,
                success: function (json) {
                    $("#kelurahan").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                        }
                    } else {
                        $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
        });
    });
</script>
  </body>
</html>
